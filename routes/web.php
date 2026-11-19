<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONT-END PROTOTYPE ROUTES (no backend yet)
|--------------------------------------------------------------------------
| Static views with sample data. Replace Route::view with controllers (and add
| auth + role middleware) when the database and logic are added.
| /sign-in and /create-account avoid clashing with Breeze's /login and /register.
*/

Route::redirect('/', '/sign-in');

// Auth
Route::view('/sign-in', 'auth.login');
Route::view('/create-account', 'auth.register');
Route::view('/forgot-password', 'auth.forgot-password');

// Student
Route::prefix('student')->group(function () {
    Route::view('/dashboard', 'student.dashboard');          // ?state=new|review|correction|approved|scheduled|claimed
    Route::view('/application', 'student.application');
    Route::view('/submitted', 'student.submitted');
    Route::view('/status', 'student.status');                // ?state=review|correction|approved|scheduled
    Route::view('/schedule', 'student.schedule');            // ?state=missed
    Route::view('/notifications', 'student.notifications');
    Route::view('/profile', 'student.profile');
});

// Registrar / ID Personnel
Route::prefix('registrar')->group(function () {
    Route::view('/', 'registrar.overview');
    Route::view('/verification', 'registrar.verification');
    Route::view('/verification/review', 'registrar.review');
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
    Route::view('/no-shows', 'registrar.no-shows');
    Route::view('/records', 'registrar.records');
});

// System Administrator
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard');
    Route::view('/users', 'admin.users');                    // ?saved=created|updated
    Route::view('/users/new', 'admin.user-form', ['isNew' => true]);
    Route::view('/users/edit', 'admin.user-form', ['isNew' => false]);
    Route::view('/roles', 'admin.roles');
    Route::view('/reports', 'admin.reports');                // ?filtered=1&exported=1
    Route::view('/activity', 'admin.activity');
    Route::view('/settings', 'admin.settings');
});
