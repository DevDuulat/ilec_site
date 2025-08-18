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
        Schema::table('partners', function (Blueprint $table) {
            $table->json('title')->nullable()->change();
            $table->dropColumn('country');
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->json('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->string('title')->change();
            $table->dropColumn('country');
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->string('country');
        });
    }
};
