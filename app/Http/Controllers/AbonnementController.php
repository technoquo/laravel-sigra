<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Membership;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbonnementController extends Controller
{
    public function index()
    {

        $abonnements = Abonnement::where('status', 1)->get();


        return view('abonnements.index', [
            'abonnements' => $abonnements
        ]);
    }
}
