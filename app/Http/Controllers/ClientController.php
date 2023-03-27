<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }
}
