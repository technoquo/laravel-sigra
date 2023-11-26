<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index($slug)
    {
        $mission = Mission::where('slug', $slug)->firstOrFail();


        return view('mission', [
            'mission' => $mission
        ]);
    }
}
