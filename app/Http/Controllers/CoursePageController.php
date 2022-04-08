<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class CoursePageController extends Controller
{
    public function index() {

        return Inertia::render('Courses', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'courses' => CourseResource::collection(Course::latest()->simplePaginate(10)),
        ]);
    }
}
