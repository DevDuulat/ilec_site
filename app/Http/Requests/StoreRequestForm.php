<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestForm extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Пожалуйста, укажите ваше имя',
            'email.required' => 'Пожалуйста, укажите ваш email',
            'email.email' => 'Пожалуйста, введите корректный email',
        ];
    }
}
