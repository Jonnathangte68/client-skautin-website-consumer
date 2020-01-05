<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeScreenController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('public.landing.welcome', [
            'page' => 'landing'
        ]);
    }
}
