<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Service\IndexServiceResource;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return IndexServiceResource::collection($services);
    }
}
