<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use App\Models\Master;


class MasterService
{
    public function StringToJson($data)
    {

        // Получаем строку типа: "MM/DD/YYYY XX/XX/YYYY" и преабразуем её в коллекцию
        $data = Str::of($data)->explode(' ');

        //Переобразуем даты в YYYY-MM-DD
        foreach ($data as $date) {
            $date = explode('/', $date);
            list($date[0], $date[1], $date[2]) = [$date[2], $date[0], $date[1]];
            $date = implode('-', $date);
            $newData[] = $date;
        }

        // Преабразуем массив в формат json для записи в бд
        $data = json_encode($newData);

        return $data;
    }
    public function ChangeDataFormat($data)
    {
        $data = json_decode($data);

        foreach ($data as $date) {
            $date = explode('-', $date);
            list($date[0], $date[2]) = [$date[2], $date[0]];
            $date = implode('-', $date);
            $newData[] = $date;
        }

        return $newData;
    }
}
