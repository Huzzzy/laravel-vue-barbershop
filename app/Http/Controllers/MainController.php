<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $reservationsCount = Reservation::all()->count();

        return view('main.index', compact('reservationsCount'));
    }
}
