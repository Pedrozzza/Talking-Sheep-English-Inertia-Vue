<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\ContactsPageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursePageController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\HomeworkPageController;
use App\Http\Controllers\InfoPageController;
use App\Http\Controllers\PriceListPageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/web/nastaveni', [SettingController::class, 'create'])->name('settings.create');
    Route::post('/web/nastaveni/hlavni', [SettingController::class, 'saveHero'])->name('settings.save-hero');
    Route::post('/web/nastaveni/info', [SettingController::class, 'saveInfo'])->name('settings.save-info');
    Route::post('/web/nastaveni/cenik', [SettingController::class, 'savePriceList'])->name('settings.save-priceList');
    Route::post('/web/nastaveni/kontakty', [SettingController::class, 'saveContacts'])->name('settings.save-contacts');
});

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/registracni-kody', [CodeController::class, 'index'])->name('codes.index');
    Route::post('/registracni-kody', [CodeController::class, 'store'])->name('codes.store');
    Route::delete('/registracni-kody/{code}', [CodeController::class, 'delete'])->name('codes.delete');
});

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/studenti', [StudentController::class, 'index'])->name('students.index');
    Route::put('/studenti/{user}', [StudentController::class, 'changeRole'])->name('students.change-role');
    Route::delete('/studenti/{user}', [StudentController::class, 'delete'])->name('students.delete');
});

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/ukoly', [HomeworkController::class, 'index'])->name('homeworks.index');
    Route::put('/ukoly/{homework}', [HomeworkController::class, 'update'])->name('homeworks.update');
    Route::delete('/ukoly/{homework}', [HomeworkController::class, 'delete'])->name('homeworks.delete');
});

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/udalosti/nastaveni', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/udalosti/pridat', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/udalosti/pridat', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/udalosti/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/udalosti/{course}/update', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/udalosti/{course}/smazat', [CourseController::class, 'delete'])->name('courses.delete');
    Route::delete('/udalosti/{course}/smazat-fotku', [CourseController::class, 'deletePhoto'])->name('courses.delete-photo');
    Route::delete('/udalosti/{course}/odebrat-uzivatele/{user}', [CourseController::class, 'removeUser'])->name('courses.remove-user');
});

Route::post('/udalosti/{course}/pridat-uzivatele', [CourseController::class, 'addUser'])->name('courses.add-user');

Route::get('/informace', [InfoPageController::class, 'index'])->name('info');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/odevzdavarna', [HomeworkController::class, 'homeworkPage'])->name('homeworks.homework-page');
    Route::post('/odevzdavarna', [HomeworkController::class, 'store'])->name('homeworks.store');
});

Route::get('/o-lektorce', function () {
    return Inertia::render('About', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('about');

Route::get('/udalosti', [CoursePageController::class, 'index'])->name('courses');

Route::get('/cenik', [PriceListPageController::class, 'index'])->name('price_list');
Route::get('/kontakty', [ContactsPageController::class, 'index'])->name('contacts');


Route::post('/apply', [\App\Http\Controllers\MessageController::class, 'store'])->name('apply');
