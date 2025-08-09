<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        if (!in_array($locale, ['en', 'ru', 'de'])) {
            abort(400, 'Unsupported language');
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        return Redirect::back();
    }
}
