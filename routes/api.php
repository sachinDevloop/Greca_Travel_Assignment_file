<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('client', [Controller::class, 'getAllclient'])->name('client.getAllclient');

Route::get('product', [Controller::class, 'getAllproduct'])->name('product.getAllproduct');

Route::get('booking', [Controller::class, 'getAllbooking'])->name('booking.getAllbooking');

Route::get('bookingstatus', [Controller::class, 'getBookingstatus'])->name('bookingstatus.getBookingstatus');

Route::post('addbooking',[Controller::class, 'addBooking'])->name('addbooking.addBooking');
