<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceOrderRequest extends FormRequest
{
    /**
     * Authorize the request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Named error bag for this request.
     */
    protected $errorBag = 'service_order';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'service_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:32'],
            'message' => ['nullable', 'string', 'max:5000'],
            'attachment' => ['nullable', 'file', 'max:10240', 'mimes:pdf,doc,docx,txt,jpg,jpeg,png,gif'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'service_name.required' => 'Название услуги обязательно для заполнения.',
            'name.required' => 'Имя обязательно для заполнения.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Введите корректный email адрес.',
            'phone.required' => 'Телефон обязателен для заполнения.',
            'attachment.file' => 'Файл должен быть загружен корректно.',
            'attachment.max' => 'Размер файла не должен превышать 10 МБ.',
            'attachment.mimes' => 'Поддерживаются только файлы: PDF, DOC, DOCX, TXT, JPG, JPEG, PNG, GIF.',
        ];
    }
}
