<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AmoCrmService
{
    protected string $baseUrl;
    protected string $accessToken;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.amocrm.base_url'), '/');
        $this->accessToken = config('services.amocrm.access_token');
    }

    protected function request(string $method, string $uri, array $data = [])
    {
        return Http::withToken($this->accessToken)
            ->acceptJson()
            ->$method("{$this->baseUrl}/api/v4{$uri}", $data)
            ->json();
    }

    public function createLeadWithContact(array $data)
    {
        $contact = $this->request('post', '/contacts', [
            [
                'name' => $data['name'],
                'custom_fields_values' => [
                    [
                        'field_code' => 'PHONE',
                        'values' => [['value' => $data['phone'] ?? '', 'enum_code' => 'WORK']]
                    ],
                    [
                        'field_code' => 'EMAIL',
                        'values' => [['value' => $data['email'] ?? '', 'enum_code' => 'WORK']]
                    ]
                ]
            ]
        ]);

        $contactId = $contact['_embedded']['contacts'][0]['id'] ?? null;

        $lead = $this->request('post', '/leads', [
            [
                'name' => 'Заявка с сайта',
                '_embedded' => [
                    'contacts' => [
                        ['id' => $contactId]
                    ]
                ],
                'custom_fields_values' => [
                    [
                        'field_name' => 'Сообщение',
                        'values' => [['value' => $data['message'] ?? '']]
                    ],
                    [
                        'field_name' => 'Источник',
                        'values' => [['value' => $data['source'] ?? 'contact_form']]
                    ]
                ]
            ]
        ]);

        return $lead;
    }
}
