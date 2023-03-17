<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use App\Models\Master;


class ReservationService
{
    public function ChangeDataFormat($data)
    {
        $date = explode('-', $data);
        list($date[0], $date[1], $date[2]) = [$date[2], $date[1], $date[0]];
        $data = implode('-', $date);

        return $data;
    }
}
