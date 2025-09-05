<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\HeroRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ServiceOrderRequest;

class ContactController extends Controller
{
    /**
     * Handle hero form submission (name, phone).
     */
    public function submitHero(HeroRequest $request)
    {
        $validated = $request->validated();

        try {
            Mail::send('emails.contact', [
                'subject' => 'Заявка (Hero) с сайта',
                'name' => $validated['name'],
                'email' => null,
                'phone' => $validated['phone'],
                'messageBody' => null,
            ], function ($message) {
                $message->to(config('mail.from.address'))
                    ->subject('Заявка (Hero) с сайта');
            });
        } catch (\Throwable $e) {
            Log::error('Contact hero mail failed', ['error' => $e->getMessage()]);
        }

        return back()->with('status', 'Спасибо! Мы свяжемся с вами.');
    }

    /**
     * Handle contact form submission (name, email, phone, message).
     */
    public function submitContact(ContactRequest $request)
    {
        $validated = $request->validated();

        try {
            Mail::send('emails.contact', [
                'subject' => 'Сообщение с формы контактов',
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'messageBody' => $validated['message'],
            ], function ($message) {
                $message->to(config('mail.from.address'))
                    ->subject('Сообщение с формы контактов');
            });
        } catch (\Throwable $e) {
            Log::error('Contact mail failed', ['error' => $e->getMessage()]);
        }

        return back()->with('status', 'Сообщение отправлено!');
    }

    /**
     * Handle service order form submission.
     */
    public function submitServiceOrder(ServiceOrderRequest $request)
    {
        $validated = $request->validated();

        try {
            // Handle file upload if present
            $attachmentPath = null;
            if ($request->hasFile('attachment')) {
                $attachmentPath = $request->file('attachment')->store('service-orders', 'public');
            }

            Mail::send('emails.service-order', [
                'subject' => 'Заказ услуги: ' . $validated['service_name'],
                'serviceName' => $validated['service_name'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'messageBody' => $validated['message'],
                'attachmentPath' => $attachmentPath,
                'attachmentName' => $request->hasFile('attachment') ? $request->file('attachment')->getClientOriginalName() : null,
            ], function ($message) use ($validated, $attachmentPath, $request) {
                $message->to(config('mail.from.address'))
                    ->subject('Заказ услуги: ' . $validated['service_name']);

                // Attach file if present
                if ($attachmentPath && $request->hasFile('attachment')) {
                    $message->attach(storage_path('app/public/' . $attachmentPath), [
                        'as' => $request->file('attachment')->getClientOriginalName(),
                        'mime' => $request->file('attachment')->getMimeType(),
                    ]);
                }
            });
        } catch (\Throwable $e) {
            Log::error('Service order mail failed', ['error' => $e->getMessage()]);
        }

        return back()->with('status', 'Заявка на услугу отправлена! Мы свяжемся с вами в ближайшее время.');
    }
}
