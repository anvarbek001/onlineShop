<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change_locale($locale){
        App::setLocale($locale);

        Session::put('locale',$locale);

        return redirect()->back();
    }
}
