<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// default:
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// our routes
Route::get('/',[Admin::class,"homepage"])->name('homepage');
Route::get('/admin',[Admin::class,"index"])->name('admin.home');
Route::get('/admin/society/{id?}',[Admin::class,"society"])->name('admin.society');
Route::get('/admin/registration',[Admin::class,"registration"])->name('admin.registration');
Route::post('/admin/registration/add',[Admin::class,'store'])->name('admin.create_soc');
