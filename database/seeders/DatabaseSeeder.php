<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UniversitySeeder;
use Database\Seeders\FaqVisaSupportSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(FaqVisaSupportSeeder::class);
        $this->call(UniversitySeeder::class);
    }
}
