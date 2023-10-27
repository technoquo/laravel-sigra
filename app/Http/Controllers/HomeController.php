<?php

namespace App\Http\Controllers;

use App\Models\Instagram;
use App\Models\Introduction;
use App\Models\Mission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $intro = Introduction::all();

        $missions = Mission::where('status', 1)->get();

        $instagrams = Instagram::where('status', 1)->get();




        foreach ($intro as $introduction) {
            $title = $introduction->title;
            $introText = htmlspecialchars_decode($introduction->intro);
        }


        return view('home')
            ->with('title', $title)
            ->with('intro', $introText)
            ->with('missions', $missions)
            ->with('instagrams', $instagrams);
    }
}
