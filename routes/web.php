<?php
use App\Models\Appointment;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AppointmentsController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function(){
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [SessionsController::class, 'create']);
});

Route::post('sessions', [SessionsController::class, 'store']);

Route::middleware('auth')->group(function()
{
    Route::post('logout', [SessionsController::class, 'destroy']);
    Route::get('dashboard', function(){
        return view('dashboard');
    });
    Route::post('update',[RegisterController::class,'update']);
    Route::resource('appointments',AppointmentsController::class)->only(['index', 'store', 'update']);
//    Route::post('appointments/update', [AppointmentsController::class, 'update']);
    Route::post('appointments/erase',[AppointmentsController::class, 'erase']);
    Route::get('user-appointments', [AppointmentsController::class, 'show']);
    Route::post('user-appointments',[AppointmentsController::class,'delete']);

});
