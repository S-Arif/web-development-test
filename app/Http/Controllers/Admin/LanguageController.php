<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        session(['lang' => $request->lang]);
        return redirect()->back();
    }
}
