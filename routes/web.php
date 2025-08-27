<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RequestFormController;


Route::get('/lang/{locale}', [LanguageController::class, 'switch'])
    ->name('lang.switch');

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::view('/contacts', 'contact')->name('contacts');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::post('/request-form', [RequestFormController::class, 'store'])->name('request-forms.store');
    Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/work-in-germany', [ProgramController::class, 'work'])->name('programs.work');
Route::get('/study-in-germany', [ProgramController::class, 'study'])->name('programs.study');
Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/visa-support', [HomeController::class, 'indexVisa'])->name('visa.support');


});

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
