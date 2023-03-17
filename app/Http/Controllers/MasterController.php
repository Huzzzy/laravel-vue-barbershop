<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Services\MasterService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Master\StoreRequest;
use App\Http\Requests\Master\UpdateRequest;

class MasterController extends Controller
{
    public $service;

    public function __construct(MasterService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        $masters = Master::all();

        return view('master.index', compact('masters'));
    }

    public function show(Master $master)
    {
        $master->available_days = $this->service->ChangeDataFormat($master->available_days);

        return view('master.show', compact('master'));
    }
    public function create()
    {
        return view('master.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();


        $data['available_days'] = $this->service->StringToJson($data['available_days']);

        $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);

        Master::create($data);

        return redirect()->route('master.index');
    }

    public function edit(Master $master)
    {
        $master->available_days = json_decode($master->available_days);

        return view('master.edit', compact('master'));
    }

    public function update(UpdateRequest $request, Master $master)
    {
        $data = $request->validated();

        if ($data['available_days'] === null) {
            $data['available_days'] = $master->available_days;
        } else {
            $data['available_days'] = $this->service->StringToJson($data['available_days']);
        }

        if (isset($data['photo'])) {
            $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);
        } else {
            $data['photo'] = $master->photo;
        }

        $master->update($data);

        return redirect()->route('master.show', compact('master'));
    }

    public function delete(Master $master)
    {
        $master->delete();

        return redirect()->route('master.index');
    }
}
