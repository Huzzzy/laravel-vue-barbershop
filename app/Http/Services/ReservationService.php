<?php

namespace App\Http\Services;

use App\Models\Client;
use App\Models\Master;
use App\Models\Reservation;
use Illuminate\Support\Str;


class ReservationService
{
    public function ChangeDataFormat($data)
    {
        $date = explode('-', $data);
        list($date[0], $date[1], $date[2]) = [$date[2], $date[1], $date[0]];
        $data = implode('-', $date);

        return $data;
    }

    public function ChangeDataFormatToTempusPlugin($data)
    {
        $date = explode('-', $data);
        list($date[0], $date[1], $date[2]) = [$date[1], $date[2], $date[0]];
        $data = implode('/', $date);

        return $data;
    }

    public function store($data)
    {
        //Ищем пользователя в базе для того, чтобы записывать количество его записей (Программы  лояльности и тд)
        //
        $client = Client::where('email', $data['email'])->first();

        if ($client !== null) {
            $client->update(['visits' => ++$client->visits]);
        } else {
            $client = Client::create([
                'email' => $data['email'],
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
    }
}
