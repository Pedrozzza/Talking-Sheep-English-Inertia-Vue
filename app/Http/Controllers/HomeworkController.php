<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeworkResource;
use App\Http\Resources\UserResource;
use App\Models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HomeworkController extends Controller
{
    public function index() {

        return Inertia::render('Homeworks/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'homeworks' => HomeworkResource::collection(Homework::latest()->simplePaginate(20)),
        ]);
    }

    public function store(Request $request) {

        $user = Auth::user();

        $this->validate($request, [
            'homework_number' => 'required|numeric|max:255',
            'file' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('file'))
        {
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file')->storeAs('public/homework_upload', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        $homework = new Homework;
        $homework->user_id = $user->id;
        $homework->name = $user->name;
        $homework->homework_number = $request->input('homework_number');
        $homework->file = $fileNameToStore;
        $homework->save();

        return redirect()->route('homeworks.homework-page');
    }

    public function update(Homework $homework) {

        $homework->checked = !$homework->checked;

        $homework->save();

        return redirect()->route('homeworks.index');
    }


    public function delete(Homework $homework) {

        Storage::delete('public/homework_upload/' . $homework->file);
        $homework->delete();

        return redirect()->route('homeworks.index');
    }

    public function homeworkPage()
    {
        return Inertia::render('Homeworks/HomeworkPage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
