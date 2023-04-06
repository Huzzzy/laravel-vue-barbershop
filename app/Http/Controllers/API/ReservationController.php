<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Reservation\GetLastClientReservationResource;
use App\Models\User;
use App\Models\Master;
use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\ReservationCode;
use App\Mail\Reservation\OtpMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Services\ReservationService;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Reservation\StoreAPIRequest;
use App\Http\Resources\Reservation\GetCodeResource;
use App\Http\Resources\Reservation\ShowAvailableTimeResource;
use App\Http\Resources\Reservation\ShowAvailableDatesResource;
use App\Models\Client;

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

    public function store(StoreAPIRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data['data']);
    }

    public function send(Request $request)
    {
        $email = $request->validate([
            'data' => 'string|email'
        ]);

        $code = mt_rand(1000, 9999);

        ReservationCode::create([
            'email' => $email['data'],
            'code' => $code
        ]);

        Mail::to($email)->send(new OtpMail($code));

        return $code;
    }

    public function getCode($email)
    {
        $code = ReservationCode::all()->where('email', $email)->sortByDesc('created_at')->first();

        return new GetCodeResource($code);
    }

    public function getLastReservation($email)
    {
        $client = Client::where('email', $email)->first();

        return new GetLastClientReservationResource($client);
    }
}
