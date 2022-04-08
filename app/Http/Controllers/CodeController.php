<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CodeController extends Controller
{
    public function index() {

        return Inertia::render('Codes/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'beginner_codes' => Code::where('category', 'beginner')->get(),
            'intermediate_codes' => Code::where('category', 'intermediate')->get(),
            'advanced_codes' => Code::where('category', 'advanced')->get(),
        ]);
    }

    public function store(Request $request) {

        $category = $request->input('category');

        $code = new Code();
        $code->code = Str::random(15);
        $code->category = $category;
        $code->save();

        return redirect()->back();
    }

    public function delete(Code $code) {

        $code->delete();

        return redirect()->back();
    }
}
