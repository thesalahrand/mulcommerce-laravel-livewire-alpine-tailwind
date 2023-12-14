<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        abort_if(!in_array(request('locale'), array_keys(config('app.available_locales'))), 400);

        app()->setLocale(request('locale'));
        session(['localization' => request('locale')]);

        return back();
    }
}
