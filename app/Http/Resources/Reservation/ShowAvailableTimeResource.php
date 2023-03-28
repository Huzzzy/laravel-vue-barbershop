<?php

namespace App\Http\Resources\Reservation;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ShowAvailableTimeResource extends ReservationResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $availableTime = [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21];
        $disabledTime = [];

        if (!strpos($this->resource, '-')) {
            $date = $this->ChangeDateFormatToDB($this->resource);
        } else {
            $date = $this->resource;
        }

        $reservations = Reservation::where('date', $date)->get();

        foreach ($reservations as $reservation) {
            $disabledTime[] = $reservation->time;
        }
        $availableTime = array_diff($availableTime, $disabledTime);

        return [
            'time' => $availableTime
        ];
    }
}
