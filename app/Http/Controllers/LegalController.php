<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        $legal = \App\Models\Legal::where('slug', 'privacy_policy')->firstOrFail();
        return view('legal',compact('legal'));
    }
    public function terms_conditions()
    {
        $legal = \App\Models\Legal::where('slug', 'terms_conditions')->firstOrFail();
        return view('legal',compact('legal'));
    }
    public function refund_policy()
    {
        $legal = \App\Models\Legal::where('slug', 'refund_policy')->firstOrFail();
        return view('legal',compact('legal'));
    }
    public function qibla_finder()
    {
        $legal = \App\Models\Legal::where('slug', 'qibla_finder')->firstOrFail();
        return view('legal',compact('legal'));
    }
    public function voice_changer()
    {
        $legal = \App\Models\Legal::where('slug', 'voice_changer')->firstOrFail();
        return view('legal',compact('legal'));
    }
}
