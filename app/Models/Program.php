<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\ProgramType;
use App\Enums\ProgramCategory;

class Program extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'category',
        'image',
        'duration',
        'salary_min',
        'salary_max',
        'currency',
        'language_level',
        'requirements',
        'additional_info',
        'min_age',
        'max_age',
    ];

    public array $translatable = [
        'title',
        'description',
        'location',
        'requirements',
        'additional_info',
    ];

    protected $casts = [
        'type' => ProgramType::class,
        'category' => ProgramCategory::class,
    ];
}
