<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Reservation\ShowAvailableDatesResource;
use App\Models\User;
use App\Models\Master;
use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function showAvailableDates(Master $master)
    {
        return new ShowAvailableDatesResource($master);
    }
    public function create()
    {
        $masters = Master::all();
        $services = Service::all();

        // $selected_master_id = 6;
        // $selected_date = '2023-03-21';
        // $selected_time = 12;

        // $enabledDates = [];
        // $disabledDates = [];

        // $enabledTime = [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21];
        // $disabledTime = [];

        // $no_available_time = false;

        // $selected_master = Master::find($selected_master_id);





        // $selected_master_reservations = Reservation::where('master_id', $selected_master->id)->get();
        // $defaultAvailableDates = json_decode($selected_master->available_days);


        // foreach ($selected_master_reservations as $reservation) {
        //     $enabledDates[] = $reservation->date;
        // }

        // $enabledDates = array_unique($enabledDates);

        // foreach ($enabledDates as $date) {
        //     $count = Reservation::where('master_id', $selected_master->id)->where('date', $date)->count();

        //     if ($count >= 12) {
        //         $disabledDates[] = $date;
        //     }
        // }

        // $enabledDates = array_diff($defaultAvailableDates, $disabledDates);

        // $reservations = Reservation::where('master_id', $selected_master->id)->where('date', $selected_date)->get();


        // foreach ($reservations as $reservation ) {
        //     $disabledTime[] = $reservation->time;
        // }
        // $enabledTime = array_diff($enabledTime, $disabledTime);
        // dd($enabledTime);


        return view('reservation.create', compact('masters', 'services'));
    }
}
