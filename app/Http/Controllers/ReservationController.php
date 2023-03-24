<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Master;
use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ReservationService;
use App\Http\Requests\Reservation\StoreRequest;
use App\Http\Requests\Reservation\UpdateRequest;

class ReservationController extends Controller
{
    public $service;

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $yesterday = Carbon::today()->subDay()->toDateTimeString();
        $lastReservations = Reservation::all()->where('created_at', '>', $yesterday);

        $reservations = Reservation::all()->sortBy([
            ['date', 'asc'],
            ['time', 'asc']
        ]);
        //Более читабельный вид дат
        foreach ($reservations as $reservation) {
            $reservation->date = $this->service->ChangeDataFormat($reservation->date);
        }

        return view('reservation.index', compact('reservations', 'lastReservations'));
    }

    public function last()
    {
        $yesterday = Carbon::today()->subDay()->toDateTimeString();
        $reservations = Reservation::all()->where('created_at', '>', $yesterday);

        //Более читабельный вид дат
        foreach ($reservations as $reservation) {
            $reservation->date = $this->service->ChangeDataFormat($reservation->date);
        }

        return view('reservation.last', compact('reservations'));
    }

    public function search()
    {
        $data = request()->validate([
            'query' => 'required|date_format:d-m-Y'
        ]);
        $data['query'] = $this->service->ChangeDataFormat($data['query']);

        $reservations = Reservation::all()->where('date', $data['query'])->sortBy('time');

        //Более читабельный вид дат
        foreach ($reservations as $reservation) {
            $reservation->date = $this->service->ChangeDataFormat($reservation->date);
        }

        return view('reservation.search', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        //Более читабельный вид дат
        $reservation->date = $this->service->ChangeDataFormat($reservation->date);

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
        //Ищем пользователя в базе для того, чтобы записывать количество его записей (Программы  лояльности и тд)
        //
        $client = Client::where('phone', $data['phone'])->first();

        if ($client !== null) {
            $client->update(['visits' => ++$client->visits]);
        } else {
            $client = Client::create([
                'phone' => $data['phone'],
                'name' => $data['name'],
                'visits' => 1,
            ]);
        }
        //

        $reservation = Reservation::create([
            'client_id' => $client->id,
            'master_id' => $data['master_id'],
            'date' => $data['date'],
            'time' => $data['time'],
            'status' => 1, // 1 - это актиная запись
            // 0 - это неактивная запись
        ]);

        $reservation->services()->attach($data['services']);

        $client->update(['status' => 1]); // 1 - это есть актиная запись
        // 0 - это нет неактивной записи

        return redirect()->route('reservation.index');
    }

    public function edit(Reservation $reservation)
    {
        $masters = Master::all();
        $services = Service::all();

        return view('reservation.edit', compact('reservation', 'masters', 'services'));
    }

    public function update(UpdateRequest $request, Reservation $reservation)
    {
        $data = $request->validated();

        $reservation->update([
            'master_id' => $data['master_id'],
            'date' => $data['date'],
            'time' => $data['time'],
        ]);
        $reservation->services()->sync($data['services']);

        return redirect()->route('reservation.show', compact('reservation'));
    }

    public function delete(Reservation $reservation)
    {
        $client = Client::where('id', $reservation->client_id)->first();

        $client->update(['status' => 0]); // 1 - это есть актиная запись
        // 0 - это нет неактивной записи

        $reservation->delete();

        return redirect()->route('reservation.index');
    }
}
