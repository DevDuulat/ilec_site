<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    
    public function run()
    {
        $universities = [
            [
                'name' => [
                    'ru' => 'Московский государственный университет',
                    'en' => 'Moscow State University',
                    'de' => 'Moskauer Staatsuniversität',
                ],
                'country' => [
                    'ru' => 'Россия',
                    'en' => 'Russia',
                    'de' => 'Russland',
                ],
                'description' => [
                    'ru' => 'Ведущий университет России, основанный в 1755 году.',
                    'en' => 'Leading university in Russia, founded in 1755.',
                    'de' => 'Führende Universität Russlands, gegründet 1755.',
                ],
                'image' => 'universities/msu.jpg',
            ],
            [
                'name' => [
                    'ru' => 'Гарвардский университет',
                    'en' => 'Harvard University',
                    'de' => 'Harvard Universität',
                ],
                'country' => [
                    'ru' => 'США',
                    'en' => 'USA',
                    'de' => 'USA',
                ],
                'description' => [
                    'ru' => 'Один из старейших университетов США, известный своими исследованиями.',
                    'en' => 'One of the oldest universities in the USA, known for research.',
                    'de' => 'Eine der ältesten Universitäten in den USA, bekannt für Forschung.',
                ],
                'image' => 'universities/harvard.jpg',
            ],
            [
                'name' => [
                    'ru' => 'Технический университет Мюнхена',
                    'en' => 'Technical University of Munich',
                    'de' => 'Technische Universität München',
                ],
                'country' => [
                    'ru' => 'Германия',
                    'en' => 'Germany',
                    'de' => 'Deutschland',
                ],
                'description' => [
                    'ru' => 'Известен своими инженерными программами и инновациями.',
                    'en' => 'Known for engineering programs and innovation.',
                    'de' => 'Bekannt für Ingenieurprogramme und Innovationen.',
                ],
                'image' => 'universities/tum.jpg',
            ],
            [
                'name' => [
                    'ru' => 'Оксфордский университет',
                    'en' => 'University of Oxford',
                    'de' => 'Universität Oxford',
                ],
                'country' => [
                    'ru' => 'Великобритания',
                    'en' => 'United Kingdom',
                    'de' => 'Vereinigtes Königreich',
                ],
                'description' => [
                    'ru' => 'Один из самых престижных университетов мира с богатой историей.',
                    'en' => 'One of the most prestigious universities worldwide with rich history.',
                    'de' => 'Eine der renommiertesten Universitäten der Welt mit reicher Geschichte.',
                ],
                'image' => 'universities/oxford.jpg',
            ],
            [
                'name' => [
                    'ru' => 'Технический университет Дрездена',
                    'en' => 'Technical University of Dresden',
                    'de' => 'Technische Universität Dresden',
                ],
                'country' => [
                    'ru' => 'Германия',
                    'en' => 'Germany',
                    'de' => 'Deutschland',
                ],
                'description' => [
                    'ru' => 'Известен сильными техническими факультетами и исследовательской деятельностью.',
                    'en' => 'Known for strong technical faculties and research activities.',
                    'de' => 'Bekannt für starke technische Fakultäten und Forschungsaktivitäten.',
                ],
                'image' => 'universities/dresden.jpg',
            ],
        ];

        foreach ($universities as $university) {
            University::create($university);
        }
    }
  }
