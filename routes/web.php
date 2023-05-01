<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Appointment;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//------------------Start----------------needs to login to access this routes!
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/', Appointment::class)->name('appointment');
    Route::get('/appointment', Appointment::class)->name('appointment');
 });
//--------------------End-------------------------------------------------------
  

