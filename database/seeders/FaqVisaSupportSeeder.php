<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqVisaSupportSeeder extends Seeder
{
 
    public function run(): void
    {
        $faqs = [
            [
                'question' => [
                    'ru' => 'Нужна ли виза для участия в программе Ausbildung?',
                    'en' => 'Do I need a visa to participate in the Ausbildung program?',
                    'de' => 'Brauche ich ein Visum für das Ausbildung-Programm?'
                ],
                'answer' => [
                    'ru' => 'Да, для участия в программе Ausbildung требуется долгосрочная национальная виза (тип D).',
                    'en' => 'Yes, a long-term national visa (type D) is required for the Ausbildung program.',
                    'de' => 'Ja, für das Ausbildung-Programm wird ein nationales Visum (Typ D) benötigt.'
                ]
            ],
            [
                'question' => [
                    'ru' => 'Сколько времени занимает оформление визы?',
                    'en' => 'How long does it take to get a visa?',
                    'de' => 'Wie lange dauert die Visa-Bearbeitung?'
                ],
                'answer' => [
                    'ru' => 'В среднем оформление визы занимает от 6 до 12 недель, в зависимости от загруженности консульства.',
                    'en' => 'Visa processing usually takes 6 to 12 weeks, depending on the embassy workload.',
                    'de' => 'Die Bearbeitung dauert in der Regel 6 bis 12 Wochen, je nach Auslastung der Botschaft.'
                ]
            ],
            [
                'question' => [
                    'ru' => 'Вы помогаете с подготовкой к собеседованию в посольстве?',
                    'en' => 'Do you help with embassy interview preparation?',
                    'de' => 'Helfen Sie bei der Vorbereitung auf das Botschaftsgespräch?'
                ],
                'answer' => [
                    'ru' => 'Да, мы проводим консультации и пробные собеседования, чтобы вы были максимально готовы.',
                    'en' => 'Yes, we provide consultations and mock interviews to ensure you are fully prepared.',
                    'de' => 'Ja, wir bieten Beratung und Probegespräche an, damit Sie bestens vorbereitet sind.'
                ]
            ],
            [
                'question' => [
                    'ru' => 'Какие документы нужны для получения визы?',
                    'en' => 'What documents are required for a visa?',
                    'de' => 'Welche Unterlagen werden für das Visum benötigt?'
                ],
                'answer' => [
                    'ru' => 'Понадобятся: приглашение, подтверждение финансирования, мотивационное письмо, страховка, анкета и фото.',
                    'en' => 'You will need: invitation, proof of financing, motivation letter, insurance, application form and photo.',
                    'de' => 'Erforderlich sind: Einladung, Finanzierungsnachweis, Motivationsschreiben, Versicherung, Formular und Foto.'
                ]
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
