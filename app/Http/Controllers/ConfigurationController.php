<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConfigurationController extends Controller
{

    public function setLocale(string $locale)
    {
        if (in_array($locale, ["en", "es"])) {
            Session::put("locale", $locale);
        }
        return redirect()->back();
    }
}
