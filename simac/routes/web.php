<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/host-schedule-a-meeting', function () {
    return Inertia\Inertia::render('host-schedule-a-meeting');
})->name('host-schedule-a-meeting');

Route::middleware(['auth:sanctum', 'verified'])->get('/reports', function () {
    return Inertia\Inertia::render('Reports');
})->name('reports');

Route::middleware(['auth:sanctum', 'verified'])->get('/meetings', function () {
    return Inertia\Inertia::render('MeetingsReceptionist');
})->name('meetings');

Route::middleware(['auth:sanctum', 'verified'])->get('/checkedinvisitors', function () {
    return Inertia\Inertia::render('CheckedInVisitors');
})->name('checkedinvisitors');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/pre-register', function () {
    return Inertia\Inertia::render('pre-registration');
})->name('pre-register');

Route::get('/personal-info', function () {
    return Inertia\Inertia::render('personal-info');
})->name('personal-info');

Route::get('/manportal', function () {
    return view('man-portal');
});

Route::get('/welcome-message', function () {
    return view('welcome-message');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard-host', function () {
    return Inertia\Inertia::render('HostDashboard');
})->name('dashboard');
?>
