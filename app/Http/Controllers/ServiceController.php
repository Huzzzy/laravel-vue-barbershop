<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Services\MasterService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    public function show(Service $service)
    {
        return view('service.show', compact('service'));
    }
    public function create()
    {
        return view('service.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Service::create($data);

        return redirect()->route('service.index');
    }

    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    public function update(UpdateRequest $request, Service $service)
    {
        $data = $request->validated();

        $service->update($data);

        return redirect()->route('service.show', compact('service'));
    }

    public function delete(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index');
    }
}
