<?php

namespace App\Http\Resources\Reservation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class ReservationResource extends JsonResource
{
    public function ChangeDateFormatToTempusPlugin($data)
    {
        $date = explode('-', $data);
        list($date[0], $date[1], $date[2]) = [$date[1], $date[2], $date[0]];
        $data = implode('/', $date);

        return $data;
    }
    public function ChangeDateFormatToDB($data)
    {
        $date = explode('/', $data);
        list($date[0], $date[1], $date[2]) = [$date[2], $date[0], $date[1]];
        $data = implode('-', $date);

        return $data;
    }
}
