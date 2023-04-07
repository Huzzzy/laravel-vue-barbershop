<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();

        return view('client.index', compact('clients'));
    }
    public function search()
    {
        $data = request()->validate([
            'query' => 'required|string'
        ]);

        $client = Client::where('email', $data['query'])->first();

        return view('client.search', compact('client'));
    }
    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|string',
            'name' => 'required|string',
        ]);

        $data['visits'] = 0;
        $data['status'] = 0;

        $client = Client::create($data);

        return redirect()->route('client.index');
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'email' => 'required|email|string',
            'name' => 'required|string',
        ]);

        $client->update($data);

        return redirect()->route('client.show', compact('client'));
    }

    public function delete(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index');
    }
}
