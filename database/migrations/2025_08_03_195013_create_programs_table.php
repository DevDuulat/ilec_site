<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('programs', function (Blueprint $table) {
            $table->id();

            // Мультиязычные поля (json)
            $table->json('title');
            $table->json('description')->nullable();
            $table->json('location')->nullable();
            $table->json('requirements')->nullable();
            $table->json('additional_info')->nullable();

            // Enum-поля
            $table->string('type');     // ProgramType: STUDY, WORK
            $table->string('category'); // ProgramCategory: AUSBILDUNG, PFLEGE, и т.д.

            // Дополнительные данные
            $table->string('image')->nullable();
            $table->string('duration')->nullable();
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->string('currency', 10)->nullable(); // EUR, USD и т.п.
            $table->string('language_level')->nullable(); // A1, B1 и т.д.
            $table->unsignedTinyInteger('min_age')->nullable();
            $table->unsignedTinyInteger('max_age')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
