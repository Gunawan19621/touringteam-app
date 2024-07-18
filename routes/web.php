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
    // return view('welcome');
    return view('landing-page.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

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
        Route::get('profile', 'show')->name('profile.show');
        Route::put('profile/{id}', 'update')->name('profile.update');
        Route::post('profile/{id}/upload-photo', 'uploadPhoto')->name('profile.uploadPhoto');
        Route::delete('profile/{id}/delete-photo', 'deletePhoto')->name('profile.deletePhoto');
        Route::put('profile/{id}/update-password', 'updatePassword')->name('profile.updatePassword');
    });

    //Menu
    //Halaman Group Touring
    Route::controller(App\Http\Controllers\T_GroupController::class)->group(function () {
        Route::get('group-touring', 'index')->name('group-touring.index');
        Route::post('group-touring/store', 'store')->name('group-touring.store');
        Route::get('group-touring/{id}/edit', 'edit')->name('group-touring.edit');
        Route::put('group-touring/{id}', 'update')->name('group-touring.update');
        Route::delete('group-touring/delete/{id}', 'destroy')->name('group-touring.destroy');
        //Untuk detail touring
        Route::get('group-touring/{id}', 'show')->name('group-touring.show');
        Route::get('/group/{id}/anggota', 'anggota')->name('group.anggota');
        Route::get('/group/{id}/area', 'area')->name('group.area');
        Route::post('group-touring/detail-group/storeArea', 'storeArea')->name('group.storeArea');
        Route::get('/group/{id}/pengaturan', 'pengaturan')->name('group.pengaturan');
    });

    //Halaman Detail Group Touring
    Route::controller(App\Http\Controllers\DetailGroupController::class)->group(function () {
        Route::put('group-touring/detail-group/{id}', 'updateDetailGroup')->name('detail-group.updateDetailGroup');
        Route::put('group-touring/detail-group/update/{id}', 'update')->name('detail-group.update');
        Route::delete('group-touring/detail-group/delete/{id}', 'destroy')->name('detail-group.destroy');
    });

    //Halaman History Group Touring

    Route::controller(App\Http\Controllers\HistoryGroupController::class)->group(function () {
        Route::get('history-group-touring', 'index')->name('history-group-touring.index');
        // Route::get('history-group-touring/create', 'create')->name('history-group-touring.create');
        // Route::post('history-group-touring/store', 'store')->name('history-group-touring.store');
        // Route::get('history-group-touring/{id}', 'show')->name('history-group-touring.show');
        // Route::get('history-group-touring/{id}/edit', 'edit')->name('history-group-touring.edit');
        // Route::put('history-group-touring/{id}', 'update')->name('history-group-touring.update');
        // Route::delete('history-group-touring/delete/{id}', 'destroy')->name('history-group-touring.destroy');
    });


    //Halaman Reminder Document
    Route::controller(App\Http\Controllers\M_DocumentController::class)->group(function () {
        Route::get('document', 'index')->name('document.index');
        Route::post('document/store', 'store')->name('document.store');
        Route::get('document/{id}', 'show')->name('document.show');
        Route::get('document/{id}/edit', 'edit')->name('document.edit');
        Route::put('document/{id}', 'update')->name('document.update');
        Route::delete('document/delete/{id}', 'destroy')->name('document.destroy');
    });

    //Halaman Reminder Sparepart
    Route::controller(App\Http\Controllers\M_SparepartController::class)->group(function () {
        Route::get('sparepart', 'index')->name('sparepart.index');
        Route::post('sparepart/store', 'store')->name('sparepart.store');
        Route::get('sparepart/{id}', 'show')->name('sparepart.show');
        Route::get('sparepart/{id}/edit', 'edit')->name('sparepart.edit');
        Route::put('sparepart/{id}', 'update')->name('sparepart.update');
        Route::delete('sparepart/delete/{id}', 'destroy')->name('sparepart.destroy');
    });

    //Halaman Transportation
    Route::controller(App\Http\Controllers\M_TransportationController::class)->group(function () {
        Route::get('transportation', 'index')->name('transportation.index');
        Route::post('transportation/store', 'store')->name('transportation.store');
        Route::get('transportation/{id}', 'show')->name('transportation.show');
        Route::get('transportation/{id}/edit', 'edit')->name('transportation.edit');
        Route::put('transportation/{id}', 'update')->name('transportation.update');
        Route::delete('transportation/delete/{id}', 'destroy')->name('transportation.destroy');
    });

    //System
    //halaman Managemen User
    Route::controller(App\Http\Controllers\M_UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.index');
        Route::post('user/store', 'store')->name('user.store');
        Route::get('user/{id}', 'show')->name('user.show');
        Route::get('user/{id}/edit', 'edit')->name('user.edit');
        Route::put('user/{id}', 'update')->name('user.update');
        Route::delete('user/delete/{id}', 'destroy')->name('user.destroy');
    });

    //halaman Managemen role
    Route::controller(App\Http\Controllers\M_RoleController::class)->group(function () {
        Route::get('role', 'index')->name('role.index');
        Route::post('role/store', 'store')->name('role.store');
        Route::get('role/{id}', 'show')->name('role.show');
        Route::get('role/{id}/edit', 'edit')->name('role.edit');
        Route::put('role/{id}', 'update')->name('role.update');
        Route::delete('role/delete/{id}', 'destroy')->name('role.destroy');
    });
});
