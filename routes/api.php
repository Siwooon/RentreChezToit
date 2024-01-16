<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccomodationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/user', [UserController::class, 'view']);
// Route::get('/ads', [AdsController::class, 'view']);
// Route::get('/login', [LoginController::class, 'view']);
// Route::get('/Register', [RegisterController::class, 'view']);
// Route::get('/ads/Create', [CreateController::class, 'view']);


Route::group(['prefix' => 'accomodation'], function () {

    Route::get('detail/{id}', [AccomodationController::class, 'show'])->name('accomodation.show');
    Route::post('add', [AccomodationController::class, 'store'])->name('accomodation.store');
    Route::put('update/{id}', [AccomodationController::class, 'update'])->name('accomodation.update');
    Route::delete('destroy/{id}', [AccomodationController::class, 'destroy'])->name('accomodation.destroy');

});



