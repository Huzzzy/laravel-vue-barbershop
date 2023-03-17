<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Photo\StoreRequest;
use App\Http\Requests\Photo\UpdateRequest;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return view('photo.index', compact('photos'));
    }

    public function show(Photo $photo)
    {
        return view('photo.show', compact('photo'));
    }
    public function create()
    {
        return view('photo.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['file_path'] = Storage::disk('public')->put('/images', $data['file_path']);

        Photo::create($data);

        return redirect()->route('photo.index');
    }

    public function edit(Photo $photo)
    {
        return view('photo.edit', compact('photo'));
    }

    public function update(UpdateRequest $request, Photo $photo)
    {
        $data = $request->validated();

        if (isset($data['file_path'])) {
            $data['file_path'] = Storage::disk('public')->put('/images', $data['file_path']);
        } else {
            $data['file_path'] = $photo->file_path;
        }

        $photo->update($data);

        return redirect()->route('photo.show', compact('photo'));
    }

    public function delete(Photo $photo)
    {
        $photo->delete();

        return redirect()->route('photo.index');
    }
}
