<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Mail\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class EmailController extends Controller
{
    public function index() {

        return Inertia::render('Emails/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'students' => UserResource::collection(User::query()->where('id', '!=', 1)->get()),
        ]);
    }

    public function send (Request $request) {

        $this->validate($request, [
            'subject' => 'required | max:100',
            'body' => 'required',
        ]);

        if ($request->input('allSelected') === true) {

            $students = User::query()->where('id', '!=', 1 )->get();
            $subject = $request->input('subject');
            $body = strip_tags($request->input('body'));

            foreach ($students as $student) {
                Mail::to($student->email)->send(new Email($body, $subject));
            }
        } else {

            $subject = $request->input('subject');
            $body = strip_tags($request->input('body'));

            foreach(User::find($request->input('studentIds')) as $user) {

                $email = $user->email;

                Mail::to($email)->send(new Email($body, $subject));
            }
        }

        return redirect()->route('emails.index');
    }
}
