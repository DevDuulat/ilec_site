<?php

namespace App\Http\Controllers;

use App\Models\RequestForm;
use App\Services\AmoCrmService;
use App\Http\Requests\StoreRequestForm;
use Illuminate\Support\Facades\Log;

class RequestFormController extends Controller
{
    public function store(StoreRequestForm $request, AmoCrmService $amo)
    {
        $validated = $request->validated();

        // Сохраняем заявку в БД
        $form = RequestForm::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
            'source' => 'contact_form',
        ]);

        try {
            // Отправляем заявку в amoCRM и логируем результат
            $response = $amo->createLeadWithContact($form->toArray());

            Log::info('Заявка отправлена в amoCRM', [
                'form_id' => $form->id,
                'data' => $form->toArray(),
                'amo_response' => $response
            ]);
        } catch (\Exception $e) {
            // Логируем ошибки при отправке в amoCRM
            Log::error('Ошибка отправки заявки в amoCRM', [
                'form_id' => $form->id,
                'data' => $form->toArray(),
                'error' => $e->getMessage()
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Спасибо! Ваше сообщение успешно отправлено.');
    }
}
