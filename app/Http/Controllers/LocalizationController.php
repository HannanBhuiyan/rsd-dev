<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLang($locale)
    {
        if(!in_array($locale, ['en', 'bn'])){
            abort(404);
        }
        App::setLocale($locale);
        Session::put('APP_LOCALE', $locale);
        return redirect()->back();
    }
}
