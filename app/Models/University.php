<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class University extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'country', 'description', 'image'];

    public $translatable = ['name', 'country', 'description'];

}
