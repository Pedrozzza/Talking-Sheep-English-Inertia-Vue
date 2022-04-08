<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ContactsPageController extends Controller
{
    public function index()
    {
        $settings = Setting::take(1)->first();

        return Inertia::render('Contacts', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'settings' => new SettingResource($settings),
        ]);
    }
}
