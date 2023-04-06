<?php

namespace App\Http\Resources\Reservation;

use App\Models\Reservation;
use Illuminate\Http\Request;

class GetLastClientReservationResource extends ReservationResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $reservation = Reservation::all()->where('client_id', $this->id)->sortByDesc('created_at')->first();

        $reservationServicesTitle = [];

        foreach ($reservation->services as $service) {
            $reservationServicesTitle[] = $service->title;
        }

        return [
            'name' => $this->name,
            'email' => $this->email,
            'master' => $reservation->master->name,
            'services' => $reservationServicesTitle,
            'date' => $reservation->date,
            'time' => $reservation->time,
        ];
    }
}
