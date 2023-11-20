<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\TalentPoolController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// ----- WEBSITE PAGES ROUTES -----------

Route::get('/', [JobPostController::class, 'showAllJobs'])->name('showAllJobs');
Route::get('apply/{id}', [JobPostController::class, 'showJob'])->name('apply');
Route::post('/application_form/store', [CandidateController::class, 'application_store'])->name('application_form.store');



// ----- Dashboard  ROUTES -----------

Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(UserController::class)->group(function () {
    Route::resource('users', UserController::class);
    Route::get('user/{id}', 'destroy')->name('destroyUser');
})->middleware(['auth', 'verified']);


Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'edit')->name('profile.edit'); 
    Route::post('profile_update', 'update')->name('profile_update');
})->middleware(['auth', 'verified']);


Route::controller(JobPostController::class)->group(function () {
    Route::resource('job_posts', JobPostController::class);
    Route::get('job/{id}', 'destroy')->name('destroyJob');
})->middleware(['auth', 'verified']);


Route::controller(CandidateController::class)->group(function () {
    Route::resource('candidates', CandidateController::class);
    Route::get('candidate/{id}', 'destroy')->name('destroyCandidate');
    Route::get('talentPool_candidate/{id}', 'addToTalentPool')->name('addToTalentPool');
})->middleware(['auth', 'verified']);


Route::controller(TalentPoolController::class)->group(function () {
    Route::resource('talent_pool', TalentPoolController::class);
})->middleware(['auth', 'verified']);




require __DIR__.'/auth.php';
