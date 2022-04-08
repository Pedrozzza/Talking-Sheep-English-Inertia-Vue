<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        return Inertia::render('Courses/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'courses' => CourseResource::collection(Course::latest()->simplePaginate(10)),
        ]);
    }

    public function create() {
        return Inertia::render('Courses/Create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required|string|max:50',
            'slug' => 'required|string|unique:courses',
            'description' => 'nullable|string|max:255',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
            'destination' => 'nullable|string|max:50',
            'price' => 'nullable',
            'image' => 'nullable|image',
        ]);

        if ($request->has('image')) {

            $imageName = (string) Str::of($request->file('image')->getClientOriginalName())
                ->beforeLast('.')
                ->slug()
                ->append('.')
                ->append($request->file('image')->getClientOriginalExtension());

            $request->file('image')->storeAs('public/courses-photos', $imageName);
        } else {
            $imageName = '';
        }

        $course = new Course;
        $course->title = $request->input('title');
        $course->slug = $request->input('slug');
        $course->description = $request->input('description');
        $course->date_start = $request->input('date_start');
        $course->date_end = $request->input('date_end');
        $course->destination = $request->input('destination');
        $course->price = $request->input('price');
        $course->image = $imageName;
        $course->show_button = $request->input('show_button');
        $course->save();

        return redirect()->route('courses.index');
    }

    public function edit(Course $course) {

        return Inertia::render('Courses/Edit', [
            'course' => new CourseResource($course),
        ]);
    }

    public function update(Request $request, Course $course) {

        $this->validate($request, [
            'title' => 'required|string|max:50',
            'slug' => 'required|string|unique:courses,slug,'.$course->id.'id',
            'description' => 'nullable|string|max:255',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
            'destination' => 'nullable|string|max:50',
            'price' => 'nullable',
            'image' => 'nullable|image',
        ]);

        if($request->has('image')) {

            $imageName = (string) Str::of($request->file('image')->getClientOriginalName())
                ->beforeLast('.')
                ->slug()
                ->append('.')
                ->append($request->file('image')->getClientOriginalExtension());

            $request->file('image')->storeAs('public/courses-photos', $imageName);
        } else {
            $imageName = $course->image;
        }

        $course->title = $request->input('title');
        $course->slug = $request->input('slug');
        $course->description = $request->input('description');
        $course->date_start = $request->input('date_start');
        $course->date_end = $request->input('date_end');
        $course->destination = $request->input('destination');
        $course->price = $request->input('price');
        $course->image = $imageName;
        $course->show_button = $request->input('show_button');
        $course->save();

        return redirect()->route('courses.index');
    }

    public function delete(Course $course) {

        $course->delete();

        return redirect()->route('courses.index');
    }

    public function deletePhoto(Course $course) {

        $course->image = '';
        $course->save();

        return redirect()->back();
    }

    public function addUser(Course $course) {

        if (Auth::user()) {
            $user = Auth::user();

            $courseUser = new CourseUser();
            $courseUser->course_id = $course->id;
            $courseUser->user_id = $user->id;
            $courseUser->save();
        }

        return redirect()->back();
    }

    public function removeUser(Course $course, User $user) {

        $courseUser = CourseUser::query()->where('course_id', '=', $course->id)
            ->where('user_id', '=', $user->id)
            ->firstOrFail();

        $courseUser->delete();

        return redirect()->back();
    }
}
