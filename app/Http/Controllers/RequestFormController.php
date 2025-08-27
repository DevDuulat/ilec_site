<?php

namespace App\Http\Controllers;

use App\Models\RequestForm;
use App\Services\AmoCrmService;
use App\Http\Requests\StoreRequestForm;

class RequestFormController extends Controller
{
    public function store(StoreRequestForm $request, AmoCrmService $amo)
    {
        $validated = $request->validated();

        $form = RequestForm::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
            'source' => 'contact_form',
        ]);

        $amo->createLeadWithContact($form->toArray());

        return redirect()
            ->back()
            ->with('success', 'Спасибо! Ваше сообщение успешно отправлено.');
    }
}
