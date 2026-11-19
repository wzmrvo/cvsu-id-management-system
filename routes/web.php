<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONT-END PROTOTYPE ROUTES (no backend yet)
|--------------------------------------------------------------------------
| Static views with sample data. Replace Route::view with controllers when
| the database and logic are added. Paths /sign-in and /create-account are
| used so they do not clash with Breeze's /login and /register.
*/

Route::redirect('/', '/sign-in');

// Auth
Route::view('/sign-in', 'auth.login');
Route::view('/create-account', 'auth.register');

// Student
Route::prefix('student')->group(function () {
    Route::view('/dashboard', 'student.dashboard');
    Route::view('/application', 'student.application');
    Route::view('/submitted', 'student.submitted');
    Route::view('/schedule', 'student.schedule');
    Route::view('/notifications', 'student.notifications');
});

// Registrar / ID Personnel
Route::prefix('registrar')->group(function () {
    Route::view('/', 'registrar.overview');
    Route::view('/verification', 'registrar.verification');
    Route::view('/verification/approved', 'registrar.approved');
    Route::view('/verification/correction', 'registrar.correction');
    Route::view('/verification/correction-sent', 'registrar.correction-sent');
    Route::view('/verification/reject', 'registrar.reject');
    Route::view('/verification/rejected', 'registrar.rejected');
    Route::view('/schedule', 'registrar.schedule');
    Route::view('/schedule/confirmed', 'registrar.schedule-confirmed');
    Route::view('/claiming', 'registrar.claiming');
    Route::view('/claiming/student', 'registrar.claiming-student');
    Route::view('/claiming/photo-needed', 'registrar.photo-needed');
    Route::view('/claiming/ready', 'registrar.ready');
    Route::view('/claiming/ready-after-photo', 'registrar.ready-after-photo');
    Route::view('/claiming/claimed', 'registrar.claimed');
});

// System Administrator
Route::prefix('admin')->group(function () {
    Route::view('/users', 'admin.users');
    Route::view('/users/new', 'admin.user-form', ['isNew' => true]);
    Route::view('/users/edit', 'admin.user-form', ['isNew' => false]);
    Route::view('/reports', 'admin.reports');
    Route::view('/activity', 'admin.activity');
});
