<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\GalleryResource;
use App\Models\Course;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class GalleryPageController extends Controller
{
    public function index() {

        return Inertia::render('Gallery', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'galleries' => GalleryResource::collection(Gallery::latest()->simplePaginate(10)),
        ]);
    }
}
