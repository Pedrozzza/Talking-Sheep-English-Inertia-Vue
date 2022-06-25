<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Laravel\Jetstream\Jetstream;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;

class MessageController extends Controller
{
    public function index()
    {
        return Inertia::render('Messages/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'messages' => MessageResource::collection(Message::latest()->simplePaginate(10)),
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|min:3|max:50',
            'phone_number' => 'required',
            'message' => 'required|min:3|max:1000',
//            'gRecaptchaResponse' => [new GoogleReCaptchaV3ValidationRule('contact_us')]
        ]);

        Message::create($request->all());

        return redirect()->back();
    }

    public function delete(Message $message) {

        $message->delete();

        return redirect()->route('messages.index');
    }
}
