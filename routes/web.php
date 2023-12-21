<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::match(['get', 'post'], '/reports/filter', [ReportController::class, 'filter'])->name('reports.filter');

Route::get('/apointment-statuses', [ReportController::class, 'getApointmentStatuses']);

Route::get('/patients', [PatientController::class, 'getPatientNames']);

Route::get('/doctors', [UserController::class, 'getDoctorsNames']);


