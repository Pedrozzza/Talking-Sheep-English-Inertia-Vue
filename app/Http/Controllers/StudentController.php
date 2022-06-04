<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index() {

        $roles = ['beginner', 'intermediate', 'advanced'];

        return Inertia::render('Students/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'students' => UserResource::collection(User::latest()->simplePaginate(50)),
            'roles' => $roles,
        ]);
    }

    public function changeRole(Request $request, User $user) {

        $user->syncRoles($request->role);

        return redirect()->route('students.index');
    }

    public function delete(User $user) {

        $user->delete();

        return redirect()->route('students.index');
    }
}
