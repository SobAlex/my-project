<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\HeroRequest;
use App\Http\Requests\ContactRequest;

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
}
