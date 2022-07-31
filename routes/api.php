<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/countries',[CountryController::class, 'index']); //This will get list of all countries
Route::get('/countries/{id}',[CountryController::class, 'show']); //This will show details for specific country a unique id
Route::post('/countries',[CountryController::class, 'store']);  //This will create a new country
Route::put('/countries/{id}',[CountryController::class, 'update']);  //Update a country using specific id
Route::delete('/countries/{id}',[CountryController::class, 'destroy']); //delete a country