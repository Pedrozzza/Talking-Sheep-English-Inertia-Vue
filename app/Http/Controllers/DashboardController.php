<?php

namespace App\Http\Controllers;

use App\Http\Resources\FolderResource;
use App\Http\Resources\PostResource;
use App\Models\Folder;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $folders = [];

        if (count($user->getRoleNames()) > 0) {
            $role = $user->getRoleNames()[0];

            switch ($role) {
                case 'Admin':
                case 'moderator':
                case 'advanced':
                    $folders = Folder::all();
                    break;
                case 'intermediate':
                    $folders = Folder::query()->where('visibility', '!=', 'advanced')->get();
                    break;
                case 'beginner':
                    $folders = Folder::query()->where('visibility', '=','beginner')->get();
                    break;
                default:
                    return '';
            }
        }

        return Inertia::render('Dashboard', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'folders' => FolderResource::collection($folders),
        ]);
    }

    public function show (Folder $folder) {

        return Inertia::render('Folders/Show', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'folder' => new FolderResource($folder),
        ]);
    }

    public function showPost (Post $post) {

        return Inertia::render('Posts/Show', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'post' => new PostResource($post),
        ]);
    }
}
