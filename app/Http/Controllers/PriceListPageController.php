<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PriceListPageController extends Controller
{
    public function index()
    {
        $settings = Setting::take(1)->first();

        return Inertia::render('PriceList', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'settings' => new SettingResource($settings),
        ]);
    }
}
