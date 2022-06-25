<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ContactsPageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursePageController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\InfoPageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PriceListPageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/studovna', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/studovna/{folder}/kategorie', [DashboardController::class, 'show'])->name('folders.show');
    Route::get('/studovna/{post}/lekce', [DashboardController::class, 'showPost'])->name('posts.show');
});

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
    Route::get('/kategorie', [FolderController::class, 'index'])->name('folders.index');
    Route::get('/kategorie/pridat', [FolderController::class, 'create'])->name('folders.create');
    Route::post('/kategorie', [FolderController::class, 'store'])->name('folders.store');
    Route::get('/kategorie/{folder}/edit', [FolderController::class, 'edit'])->name('folders.edit');
    Route::put('/kategorie/{folder}/update', [FolderController::class, 'update'])->name('folders.update');
    Route::put('/kategorie/{folder}', [FolderController::class, 'changeVisibility'])->name('folders.change-visibility');
    Route::delete('/kategorie/{folder}/smazat-fotku', [FolderController::class, 'deletePhoto'])->name('folders.delete-photo');
    Route::delete('/kategorie/{folder}', [FolderController::class, 'delete'])->name('folders.delete');
});

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/lekce', [PostController::class, 'index'])->name('posts.index');
    Route::get('/lekce/pridat', [PostController::class, 'create'])->name('posts.create');
    Route::post('/lekce', [PostController::class, 'store'])->name('posts.store');
    Route::get('/lekce/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/lekce/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/lekce/{post}', [PostController::class, 'delete'])->name('posts.delete');
    Route::delete('/lekce/{post}/smazat', [PostController::class, 'deleteFromFolders'])->name('posts.delete-from-folders');
});

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/udalosti/nastaveni', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/udalosti/pridat', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/udalosti/pridat', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/udalosti/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/udalosti/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/udalosti/{course}/smazat', [CourseController::class, 'delete'])->name('courses.delete');
    Route::delete('/udalosti/{course}/smazat-fotku', [CourseController::class, 'deletePhoto'])->name('courses.delete-photo');
    Route::delete('/udalosti/{course}/odebrat-uzivatele/{user}', [CourseController::class, 'removeUser'])->name('courses.remove-user');
});

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/emaily', [EmailController::class, 'index'])->name('emails.index');
    Route::post('/emaily-odeslat', [EmailController::class, 'send'])->name('emails.send');
});

Route::group(['middleware' => ['permission:edit web']],function () {
    Route::get('/zpravy', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/zpravy/{message}', [MessageController::class, 'delete'])->name('messages.delete');
});

Route::post('/udalosti/{course}/pridat-uzivatele', [CourseController::class, 'addUser'])->name('courses.add-user');
Route::get('/udalosti/{course}/', [CourseController::class, 'show'])->name('courses.show');

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

