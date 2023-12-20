<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Landing_page;
use App\Http\Controllers\Society;
use App\Http\Controllers\Student;

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
Route::post('/',[Landing_page::class,"auth"])->name('auth');
Route::post('/create_user',[Landing_page::class,"create"])->name('create_user');

// admin routes
// we need protect that route using middlewhere use auth and grupt all routes


Route::get('/admin',[Admin::class,"index"])->name('admin.home');
Route::get('/admin/society/',[Admin::class,"society"])->name('admin.society');
Route::get('/admin/registration',[Admin::class,"registration"])->name('admin.registration');
Route::post('/admin/registration/add',[Admin::class,'store'])->name('admin.create_soc');
Route::get('/admin/society/{id}',[Admin::class,"delete"])->name('admin.society.delete');

// society routes
Route::middleware(['authuser'])->group(function () {
    // Your routes that require the 'authuser' middleware
Route::get('/society',[Society::class,"index"])->name('society.home');  
Route::get('/society/member',[Society::class,"member"])->name('society.member');  
Route::get('/society/event',[Society::class,"event"])->name('society.event');  
Route::get('/society/event_create',[Society::class,"event_create"])->name('society.event_create');  
Route::post('/society/event_create',[Society::class,"event_create_create"])->name('society.event_create');  
Route::get('/society/certificate',[Society::class,"certificate"])->name('society.certificate');  
Route::get('/society/attendence',[Society::class,"attendence"])->name('society.attendence');  
Route::get('/society/logout',[Society::class,"logout"])->name('society.logout');
});


// user/student routes
Route::middleware(['authstudent'])->group(function () {
    // Your routes that require the 'authstudent' middleware
    Route::get('/student',[Student::class,"index"])->name('student.home');
Route::get('/student/event',[Student::class,"event"])->name('student.event');
Route::get('/student/certificate',[Student::class,"certificate"])->name('student.certification');
Route::get('/student/attendence',[Student::class,"attendence"])->name('student.attendence');
Route::get('/student/logout',[Student::class,"logout"])->name('student.logout');
});
