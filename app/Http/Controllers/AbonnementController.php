<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use Illuminate\Http\Request;

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
