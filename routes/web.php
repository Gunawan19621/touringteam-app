<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReminderDocument;

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

    //sampe bawah di sini tidak di pakai
    Route::get('/member-group', function () {
        return view('pages.admin.member-group.index');
    })->name('member-group');
    Route::get('/chat', function () {
        return view('pages.admin.chat.index');
    })->name('chat');
});

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    //halaman profile
    Route::controller(App\Http\Controllers\ProfileController::class)->group(function () {
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

    //Menu
    //Halaman Reminder Document
    Route::controller(App\Http\Controllers\M_DocumentController::class)->group(function () {
        Route::get('document', 'index')->name('document.index');
        // Route::get('document/create', 'create')->name('document.create');
        Route::post('document/store', 'store')->name('document.store');
        Route::get('document/{id}', 'show')->name('document.show');
        Route::get('document/{id}/edit', 'edit')->name('document.edit');
        Route::put('document/{id}', 'update')->name('document.update');
        Route::delete('document/delete/{id}', 'destroy')->name('document.destroy');
    });

    //Halaman Reminder Sparepart

    //System
    //halaman Managemen User
    Route::controller(App\Http\Controllers\M_UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.index');
        // Route::get('user/create', 'create')->name('user.create');
        Route::post('user/store', 'store')->name('user.store');
        Route::get('user/{id}', 'show')->name('user.show');
        Route::get('user/{id}/edit', 'edit')->name('user.edit');
        Route::put('user/{id}', 'update')->name('user.update');
        Route::delete('user/delete/{id}', 'destroy')->name('user.destroy');
    });

    //halaman Managemen role
    Route::controller(App\Http\Controllers\M_RoleController::class)->group(function () {
        Route::get('role', 'index')->name('role.index');
        // Route::get('role/create', 'create')->name('role.create');
        Route::post('role/store', 'store')->name('role.store');
        Route::get('role/{id}', 'show')->name('role.show');
        Route::get('role/{id}/edit', 'edit')->name('role.edit');
        Route::put('role/{id}', 'update')->name('role.update');
        Route::delete('role/delete/{id}', 'destroy')->name('role.destroy');
    });

    //
    //
    //
    //
    //
    //halaman Komunitas
    Route::get('/community', function () {
        return view('pages.admin.community.index');
    });
    Route::get('/community/create', function () {
        return view('pages.admin.community.create');
    });

    //halaman Touring
    Route::get('/touring', function () {
        return view('pages.admin.touring.index');
    });
    Route::get('/touring/create', function () {
        return view('pages.admin.touring.create');
    });
    Route::get('/touring/history', function () {
        return view('pages.admin.touring.history');
    });

    //halaman detail touring aktif
    Route::get('/touring/detail', function () {
        return view('pages.admin.touring.detail-touring-aktif.index');
    });

    //halaman reminder sparepart
    Route::get('/reminder-sparepart', function () {
        return view('pages.admin.reminder.sparepart.index');
    });
    Route::get('/reminder-sparepart/create', function () {
        return view('pages.admin.reminder.sparepart.create');
    });
    Route::get('/reminder-sparepart/edit', function () {
        return view('pages.admin.reminder.sparepart.edit');
    });
});
