<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\Reservation\StoreRequest;
use App\Http\Requests\Reservation\UpdateRequest;
use App\Models\Master;
use App\Models\Service;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservation.index', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        return view('reservation.show', compact('reservation'));
    }

    public function create()
    {
        $masters = Master::all();
        $services = Service::all();

        return view('reservation.create', compact('masters', 'services'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Reservation::create($data);

        return redirect()->route('reservation.index');
    }

    public function edit(Reservation $reservation)
    {
        return view('reservation.edit', compact('reservation'));
    }

    public function update(UpdateRequest $request, Reservation $reservation)
    {
        $data = $request->validated();

        $reservation->update($data);

        return redirect()->route('reservation.show', compact('reservation'));
    }

    public function delete(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservation.index');
    }
}
