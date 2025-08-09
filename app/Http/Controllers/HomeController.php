<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Partner;
use App\Models\University;

class HomeController extends Controller
{
    public function index()
    {
    
        $partners = Partner::latest()->take(3)->get();
        $faqs = Faq::all();
        $universities = University::all();
\Log::debug('Locale type: ' . gettype(app()->getLocale()));
\Log::debug('Locale value: ', [app()->getLocale()]);

        return view('home', compact('partners', 'faqs', 'universities'));
    }

    public function indexVisa()
    {        
      return view('visa-support');
    }

}
