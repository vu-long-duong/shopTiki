<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLocale($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
