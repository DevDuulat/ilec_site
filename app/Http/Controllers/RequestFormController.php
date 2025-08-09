<?php

namespace App\Http\Controllers;

use App\Models\RequestForm;
use App\Http\Requests\StoreRequestForm;

class RequestFormController extends Controller
{
    public function store(StoreRequestForm $request)
    {
        $validated = $request->validated();

        RequestForm::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
            'source' => 'contact_form',
        ]);

        return redirect()
                ->back()
                ->with('success', 'Спасибо! Ваше сообщение успешно отправлено. Мы свяжемся с вами в ближайшее время.');
    }
}
