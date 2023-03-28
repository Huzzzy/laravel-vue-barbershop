<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Master;
use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ReservationService;
use App\Http\Resources\Reservation\ShowAvailableTimeResource;
use App\Http\Resources\Reservation\ShowAvailableDatesResource;

class ReservationController extends Controller
{
    public $service;

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
    }

    public function showAvailableDates(Master $master)
    {
        return new ShowAvailableDatesResource($master);
    }

    public function showAvailableTime($time)
    {
        return new ShowAvailableTimeResource($time);
    }

    public function store(Request $request)
    {

        $data = $request->input('data');

        if (
            gettype($data['date']) !== 'string' &&
            gettype($data['name']) !== 'string' &&
            gettype($data['phone']) !== 'string' &&
            gettype($data['master_id']) !== 'integer' &&
            gettype($data['time']) !== 'integer' &&
            gettype($data['services']) !== 'array'
        ) {
            return;
        }

        $this->service->store($data);

        return;
    }
}
