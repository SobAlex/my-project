<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\HeroRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ServiceOrderRequest;
use App\Jobs\SendContactEmail;
use App\Jobs\SendServiceOrderEmail;

class ContactController extends Controller
{
    /**
     * Handle hero form submission (name, phone).
     */
    public function submitHero(HeroRequest $request)
    {
        $validated = $request->validated();

        // Отправляем письмо в очередь
        SendContactEmail::dispatch([
            'subject' => 'Заявка (Hero) с сайта',
            'name' => $validated['name'],
            'email' => null,
            'phone' => $validated['phone'],
            'messageBody' => null,
        ]);

        return back()->with('status', 'Спасибо! Мы свяжемся с вами.');
    }

    /**
     * Handle contact form submission (name, email, phone, message).
     */
    public function submitContact(ContactRequest $request)
    {
        $validated = $request->validated();

        // Отправляем письмо в очередь
        SendContactEmail::dispatch([
            'subject' => 'Сообщение с формы контактов',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'messageBody' => $validated['message'],
        ]);

        return back()->with('status', 'Сообщение отправлено!');
    }

    /**
     * Handle service order form submission.
     */
        public function submitServiceOrder(ServiceOrderRequest $request)
    {
        $validated = $request->validated();

        // Handle file upload if present
        $attachmentPath = null;
        $attachmentName = null;
        $attachmentMime = null;

        if ($request->hasFile('attachment')) {
            /** @var \Illuminate\Http\UploadedFile $file */
            $file = $request->file('attachment');
            if ($file) {
                $attachmentPath = $file->store('service-orders', 'public');
                $attachmentName = $file->getClientOriginalName();
                $attachmentMime = $file->getMimeType();
            }
        }

        // Отправляем письмо в очередь
        SendServiceOrderEmail::dispatch([
            'subject' => 'Заказ услуги: ' . $validated['service_name'],
            'serviceName' => $validated['service_name'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'messageBody' => $validated['message'] ?? null,
            'attachmentPath' => $attachmentPath,
            'attachmentName' => $attachmentName,
            'attachmentMime' => $attachmentMime,
        ]);

        return back()->with('status', 'Заявка на услугу отправлена! Мы свяжемся с вами в ближайшее время.');
    }
}
