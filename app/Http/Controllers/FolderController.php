<?php

namespace App\Http\Controllers;

use App\Http\Resources\FolderResource;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class FolderController extends Controller
{
    public function index() {

        $visibilities = ['beginner', 'intermediate', 'advanced'];

        return Inertia::render('Folders/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'folders' => FolderResource::collection(Folder::latest()->simplePaginate(20)),
            'visibilities' => $visibilities,
        ]);
    }

    public function create() {

        $visibilities = ['beginner', 'intermediate', 'advanced'];

        return Inertia::render('Folders/Create', [
            'visibilities' => $visibilities,
        ]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable',
            'color' => 'required',
            'visibility' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->has('image')) {

            $imageName = (string) Str::of($request->file('image')->getClientOriginalName())
                ->beforeLast('.')
                ->slug()
                ->append('.')
                ->append($request->file('image')->getClientOriginalExtension());

            $request->file('image')->storeAs('public/folders-photos', $imageName);
        } else {
            $imageName = '';
        }

        $folder = new Folder;
        $folder->title = $request->input('title');
        $folder->description = $request->input('description');
        $folder->color = $request->input('color');
        $folder->visibility = $request->input('visibility');
        $folder->image = $imageName;
        $folder->save();

        return redirect()->route('folders.index');
    }

    public function edit(Folder $folder) {

        $visibilities = ['beginner', 'intermediate', 'advanced'];

        return Inertia::render('Folders/Edit', [
            'folder' => new FolderResource($folder),
            'visibilities' => $visibilities,
        ]);
    }

    public function update(Request $request, Folder $folder) {

        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable',
            'color' => 'required',
            'visibility' => 'required',
            'image' => 'nullable|image',
        ]);

        if($request->has('image')) {

            $imageName = (string) Str::of($request->file('image')->getClientOriginalName())
                ->beforeLast('.')
                ->slug()
                ->append('.')
                ->append($request->file('image')->getClientOriginalExtension());

            $request->file('image')->storeAs('public/folders-photos', $imageName);
        } else {
            $imageName = $folder->image;
        }

        $folder->title = $request->input('title');
        $folder->description = $request->input('description');
        $folder->color = $request->input('color');
        $folder->visibility = $request->input('visibility');
        $folder->image = $imageName;
        $folder->save();

        return redirect()->route('folders.index');
    }

    public function changeVisibility(Request $request, Folder $folder) {

        $folder->visibility = $request->visibility;
        $folder->save();

        return redirect()->route('folders.index');
    }

    public function deletePhoto(Folder $folder) {

        $folder->image = '';
        $folder->save();

        return redirect()->back();
    }

    public function delete(Folder $folder) {

        $folder->delete();

        return redirect()->route('folders.index');
    }
}
