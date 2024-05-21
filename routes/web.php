<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.admin.index');
        // return view('dashboard');
    })->name('dashboard');
    Route::get('/member-group', function () {
        return view('pages.admin.member-group.index');
    })->name('member-group');
    Route::get('/chat', function () {
        return view('pages.admin.chat.index');
    })->name('chat');
});

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        // Route::get('profile', 'index')->name('profile.index');
        // Route::get('profile/create', 'create')->name('profile.create');
        // Route::post('profile/store', 'store')->name('profile.store');
        Route::get('profile', 'show')->name('profile.show');
        // Route::get('profile/{id}/edit', 'edit')->name('profile.edit');
        Route::put('profile/{id}', 'update')->name('profile.update');
        // Route::delete('profile/delete/{id}', 'destroy')->name('profile.destroy');
        Route::post('profile/{id}/upload-photo', 'uploadPhoto')->name('profile.uploadPhoto');
        Route::delete('profile/{id}/delete-photo', 'deletePhoto')->name('profile.deletePhoto');
        Route::put('profile/{id}/update-password', 'updatePassword')->name('profile.updatePassword');
    });
});
