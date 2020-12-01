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

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/pre-register', function () {
    return Inertia\Inertia::render('pre-registration');
})->name('pre-register');

Route::get('/manportal', function () {
    return view('man-portal');
});

Route::get('/welcome-message', function () {
    return view('welcome-message');
});

Route::get('/generate-badge/{schedule?}', function ($schedule = null) {
    return Inertia\Inertia::render('Generate-visitor-badge',['schedule' =>$schedule]);
})->name('generate-badge');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard-host', function () {
    return Inertia\Inertia::render('HostDashboard');
})->name('dashboard');

Route::get('images/{filename}', function ($filename)
{
    $path = storage_path($filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
?>
