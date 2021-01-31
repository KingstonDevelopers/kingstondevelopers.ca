<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\MeetupController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SlackController;
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

Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::get('/events', [MeetupController::class, 'showMeetups'])->name('events');
Route::get('/jobs', [JobsController::class, 'showJobSites'])->name('jobs');
Route::get('/slack/badge.svg', [SlackController::class, 'badge'])->name('badge');
Route::get('/slack/invite', [SlackController::class, 'showInvite'])->name('show_invite');
Route::post('/slack/invite', [SlackController::class, 'requestInvite'])->name('request_invite')->middleware(['throttle:3']);

Route::middleware(['auth:sanctum', 'verified'])->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    }
);

