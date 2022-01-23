<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

class MessageController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|min:3|max:50',
            'phone_number' => 'required',
            'message' => 'required|min:3|max:500',
        ]);

        Message::create($request->all());

        return redirect()->back();
    }
}
