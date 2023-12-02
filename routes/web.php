<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Landing_page;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// landing page
Route::get('/',[Landing_page::class,"homepage"])->name('homepage');

// admin routes
// we need protect that route using middlewhere use auth and grupt all routes

Route::get('/admin',[Admin::class,"index"])->name('admin.home');
Route::get('/admin/society/',[Admin::class,"society"])->name('admin.society');
Route::get('/admin/registration',[Admin::class,"registration"])->name('admin.registration');
Route::post('/admin/registration/add',[Admin::class,'store'])->name('admin.create_soc');
Route::get('/admin/society/{id}',[Admin::class,"delete"])->name('admin.society.delete');

// society routes

// user/student routes