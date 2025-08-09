<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Поддерживаемые языки
        $locales = ['en', 'ru', 'de'];

        // 1. Проверяем явный параметр в URL (?lang=ru)
        if ($request->has('lang') && in_array($request->lang, $locales)) {
            $locale = $request->lang;
            App::setLocale($locale);
            Session::put('locale', $locale);
            return $next($request);
        }

        // 2. Проверяем язык в сессии
        if (Session::has('locale') && in_array(Session::get('locale'), $locales)) {
            App::setLocale(Session::get('locale'));
            return $next($request);
        }

        // 3. Определяем язык браузера
        $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        if (in_array($browserLocale, $locales)) {
            App::setLocale($browserLocale);
            Session::put('locale', $browserLocale);
            return $next($request);
        }

        // 4. Язык по умолчанию
        App::setLocale(config('app.fallback_locale', 'en'));
        return $next($request);
    }
}
