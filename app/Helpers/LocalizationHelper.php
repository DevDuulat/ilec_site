<?php

use Illuminate\Support\Facades\App;

if (!function_exists('localized_route')) {
    function localized_route($name, $parameters = [], $locale = null, $absolute = true)
    {
        $locale = $locale ?: App::getLocale();

        // Для маршрутов, которые не требуют локали
        if (!in_array($name, ['home', 'contacts', 'request-forms.store'])) {
            return route($name, $parameters, $absolute);
        }

        // Добавляем параметр языка в URL
        return route($name, array_merge($parameters, ['lang' => $locale]), $absolute);
    }
}

if (!function_exists('switch_language_url')) {
    function switch_language_url($locale)
    {
        $currentUrl = url()->current();
        $currentQuery = request()->query();

        // Обновляем параметр языка
        $currentQuery['lang'] = $locale;

        return $currentUrl . '?' . http_build_query($currentQuery);
    }
}