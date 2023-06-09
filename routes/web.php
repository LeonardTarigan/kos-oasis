<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/room/{type}', [RoomController::class, 'show']);
Route::get('/admin', [RoomController::class, 'showTable'])->middleware(['auth', 'verified'])->name('admin');
Route::get('/admin/add-room', [AdminController::class, 'addRoom']);
Route::get('/admin/edit-room/{roomNo}', [AdminController::class, 'editRoom']);

Route::post('/admin/create-room', [RoomController::class, 'create']);
Route::post('/admin/update-customer/{roomNo}', [AdminController::class, 'updateCustomer']);

Route::delete('/admin/delete/{roomNo}', [RoomController::class, 'delete']);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
