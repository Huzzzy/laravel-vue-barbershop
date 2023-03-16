<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use App\Models\Master;


class MasterService
{
    public function StringToJson($data)
    {
        // Получаем строку типа: "XX/XX/YYYY XX/XX/YYYY" и преабразуем её в коллекцию
        $data = Str::of($data)->explode(' ');
        // Преабразуем коллекцию в формат json для записи в бд
        $data = $data->toJson();

        return $data;
    }
}
