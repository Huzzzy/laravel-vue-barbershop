<?php

namespace App\Console;

use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use App\Models\ReservationCode;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        //Удаление кодов записи каждый день
        $schedule->call(function () {
            $codes = ReservationCode::all()->where('created_at', '<', Carbon::today());
            foreach ($codes as $code) {
                $code->delete();
            }
        })->daily();

        //Удалнение записей, дата которых уже прошла
        $schedule->call(function () {
            $reservations = Reservation::all()->where('date', '<', Carbon::today()->subDay()->toDateTimeString());
            foreach ($reservations as $reservation) {
                $reservation->delete();
            }
        })->daily();

        //Смена статусов клиентов, если у них нету активных записей
        $schedule->call(function () {
            $clients = Client::all();
            foreach ($clients as $client) {
                if (Reservation::where('client_id', $client->id)->count() === 0) {
                    $client->update([
                        'status' => 0
                    ]);
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
