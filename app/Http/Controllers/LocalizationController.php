<?php

namespace App\Http\Controllers;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function switch($language = 'en')
    {
        request()->session()->put('locale', $language);
        return redirect()->back();
    }
}
