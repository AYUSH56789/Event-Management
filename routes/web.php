<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Landing_page;
use App\Http\Controllers\Society;
use App\Http\Controllers\Student;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\CertificateController;

// landing page
Route::get('/', [Landing_page::class, "homepage"])->name('homepage');
Route::post('/', [Landing_page::class, "auth"])->name('auth');
Route::post('/create_user', [Landing_page::class, "create"])->name('create_user');

// admin routes
// we need protect that route using middlewhere use auth and grupt all routes


Route::get('/admin', [Admin::class, "index"])->name('admin.home');
Route::get('/admin/society/', [Admin::class, "society"])->name('admin.society');
Route::get('/admin/registration', [Admin::class, "registration"])->name('admin.registration');
Route::post('/admin/registration/add', [Admin::class, 'store'])->name('admin.create_soc');
Route::get('/admin/society/{id}', [Admin::class, "delete"])->name('admin.society.delete');

// society routes
Route::middleware(['authuser'])->group(function () {
    Route::get('/society', [Society::class, "index"])->name('society.home');
    Route::get('/society/member', [Society::class, "member"])->name('society.member');
    Route::get('/society/event', [Society::class, "event"])->name('society.event');
    Route::get('/society/event_create', [Society::class, "event_create"])->name('society.event_create');
    Route::post('/society/event_create', [Society::class, "event_create_create"])->name('society.event_create');
    Route::get('/society/certificate', [CertificateController::class, 'index'])->name('society.certificate');  
    Route::post('/society/certificate', [CertificateController::class, 'index'])->name('society.certificate');  
    Route::get('/certificates/download/{id}', [CertificateController::class, 'downloadCertificate'])
        ->name('certificate.download');
    Route::post('/certificate/generate', [CertificateController::class, 'generateCertificate'])->name('generateCertificate');
    Route::get('/society/attendence', [Society::class, "attendence"])->name('society.attendence');
    Route::post('/generate-qrcode', [AttendenceController::class, 'generate'])->name('society.generate-qrcode');
    Route::post('/deactivate-qrcode', [AttendenceController::class, 'deactivate'])->name('society.deactivate-qrcode');
    Route::get('/society/logout', [Society::class, "logout"])->name('society.logout');
});


// user/student routes
Route::middleware(['authstudent'])->group(function () {
    Route::get('/student', [Student::class, "index"])->name('student.home');
    Route::get('/student/event', [Student::class, "event"])->name('student.event');
    Route::get('/student/event/register', [Student::class, "event_reg"])->name('student.event_reg');
    Route::get('/student/certificate', [Student::class, "certificate"])->name('student.certification');
    Route::get('/student/attendence', [Student::class, "attendence"])->name('student.attendence');
    Route::post('/student/attendence', [AttendenceController::class, "processQRCode"])->name('student.process-qrcode');
    // web.php
// Route::post('/society/process-qrcode', 'SocietyController@processQRCode')->name('society.process-qrcode');

    Route::get('/student/logout', [Student::class, "logout"])->name('student.logout');
});
