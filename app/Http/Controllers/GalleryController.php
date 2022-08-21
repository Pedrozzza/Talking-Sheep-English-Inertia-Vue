<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\GalleryResource;
use App\Models\Course;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function index()
    {
        return Inertia::render('Galleries/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'galleries' => GalleryResource::collection(Gallery::latest()->simplePaginate(10)),
        ]);
    }

    public function create() {
        return Inertia::render('Galleries/Create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'images' => 'required'
        ]);

        if ($request->has('images')) {

            $names = [];

            foreach ($request->file('images') as $item) {
                $names [] = $itemName = (string) Str::of($item->getClientOriginalName())
                    ->beforeLast('.')
                    ->slug()
                    ->append('.')
                    ->append($item->getClientOriginalExtension());

                $item->storeAs('public/galleries-media', $itemName);
            }
        } else {
            $names = [];
        }

        $gallery = new Gallery;
        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->images = $names;
        $gallery->save();

        return redirect()->route('galleries.index');
    }
    public function show (Gallery $gallery) {

        return Inertia::render('Galleries/Show', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'gallery' => new GalleryResource($gallery),
        ]);
    }


    public function edit(Gallery $gallery) {

        return Inertia::render('Galleries/Edit', [
            'gallery' => new GalleryResource($gallery),
        ]);
    }

    public function update(Request $request, Gallery $gallery) {

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'images' => 'nullable'
        ]);

        if ($request->has('images') && $request->file('images') !== null ) {

            $names = [];

            foreach ($request->file('images') as $item) {
                $names [] = $itemName = (string) Str::of($item->getClientOriginalName())
                    ->beforeLast('.')
                    ->slug()
                    ->append('.')
                    ->append($item->getClientOriginalExtension());

                $item->storeAs('public/galleries-media', $itemName);
            }
        } else {
            $names = $gallery->images;
        }

        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->images = $names;
        $gallery->save();

        return redirect()->route('galleries.index');
    }

    public function delete(Gallery $gallery) {

        $gallery->delete();

        return redirect()->route('galleries.index');
    }
}
