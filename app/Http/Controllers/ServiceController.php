<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
       public function index()
        {
            $services = Service::where('active', true)
                            ->orderBy('created_at', 'desc')
                            ->get();

            return view('services', [
                'services' => $services
            ]);
        }
}
