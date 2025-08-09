<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['title', 'description', 'content'];

    protected $fillable = [
        'title',
        'description',
        'content',
        'monthly_price',
        'full_price',
        'image',
        'active'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'content' => 'array',
    ];

    public function getCategoryNameAttribute()
    {
        return [
            'higher_education' => __('messages.services.categories.higher_education'),
            'language_courses' => __('messages.services.categories.language_courses'),
        ][$this->category];
    }
}
