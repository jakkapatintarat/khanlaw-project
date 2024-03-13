<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
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

// User Routes
Route::get('/', function () {
    return view('page.homepage');
});
Route::get('about', function () {
    return view('page.about');
});


// Room Routes -> Read
Route::get('room-list', [RoomController::class, 'all'])->name('roomlist');
Route::get('room-tent', [RoomController::class, 'tent'])->name('roomtent');
Route::get('room-hazel', [RoomController::class, 'hazel'])->name('roomhazel');
Route::get('room-holly', [RoomController::class, 'holly'])->name('roomholly');
Route::get('room-detail/{id}', [RoomController::class, 'show'])->name('roomdetail');

// Room Routes -> Create Update Delete
Route::post('room/create', [RoomController::class,'store'])->name('createroom');


// Admin Routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    // รายงานผล
    Route::get('dashboard', function () {
        return view('page.admin.dashboard');
    })->name('dashboard');
    // จัดการหน้าเกี่ยวกับ
    Route::get('manage-about', function () {
        return view('page.admin.manage-about');
    })->name('manage-about');
    // จัดการห้องพัก
    Route::get('manage-room', [App\Http\Controllers\RoomController::class, 'index'])->name('manage-room');
    Route::get('edit-room/{id}', [App\Http\Controllers\RoomController::class, 'edit'])->name('edit-room');
    Route::get('delete-room/{id}', [App\Http\Controllers\RoomController::class, 'destroy'])->name('delete-room');
    // จัดการผู้ใช้
    Route::get('manage-user', [App\Http\Controllers\UserController::class, 'index'])->name('manage-user');
});
