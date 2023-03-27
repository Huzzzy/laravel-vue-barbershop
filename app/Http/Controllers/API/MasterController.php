<?php

namespace App\Http\Controllers\API;

use App\Models\Master;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Master\IndexMasterResource;

class MasterController extends Controller
{
    public function index()
    {
        $masters = Master::all();

        return IndexMasterResource::collection($masters);
    }
}
