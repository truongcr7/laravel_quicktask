<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.admin');
    }

    public function changeLanguage($locale)
    {
        if ($locale && in_array($locale, config('app.languages'))) {
            Session::put('language', $locale);
        }

        return redirect()->back();        
    }
}
