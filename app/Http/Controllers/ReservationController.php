<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $reservations = Reservation::all();

        //Более читабельный вид дат
        foreach ($reservations as $reservation ) {
            $reservation->date = $this->service->ChangeDataFormat($reservation->date);
        }

        return view('reservation.index', compact('reservations'));
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
        $user = User::where('phone', $data['phone'])->first();

        if ($user !== null) {
            $user->update(['visits' => ++$user->visits]);
        } else {
            $user = User::create([
                'phone' => $data['phone'],
                'name' => $data['name'],
                'visits' => 1,
            ]);
        }
        //

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'master_id' => $data['master_id'],
            'date' => $data['date'],
            'time' => $data['time'],
            'status' => 1, // 1 - это актиная запись
                           // 0 - это неактивная запись
        ]);

        $reservation->services()->attach($data['services']);

        $user->update(['status' => 1]); // 1 - это есть актиная запись
                                        // 0 - это нет неактивной записи

        return redirect()->route('reservation.index');
    }

    public function edit(Reservation $reservation)
    {
        $masters = Master::all();
        $services = Service::all();

        $reservation->date = $this->service->ChangeDataFormatToTempusPlugin($reservation->date);

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
        $user = User::where('id', $reservation->user_id)->first();

        $user->update(['status' => 0]); // 1 - это есть актиная запись
                                        // 0 - это нет неактивной записи

        $reservation->delete();

        return redirect()->route('reservation.index');
    }
}
