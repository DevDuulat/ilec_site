<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Course extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title', 'description', 'tags', 'duration', 'group_size', 'price', 'image', 'is_popular', 'category'
    ];

    public $translatable = ['title', 'description', 'tags', 'category'];

    protected $casts = [
        'tags' => 'array',
        'is_popular' => 'boolean',
    ];
}
