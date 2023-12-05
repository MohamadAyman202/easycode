<?php

use App\Http\Controllers\APi\ApiController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('api_token', [ApiController::class, 'api_token']);
Route::middleware('api_token')->group(function () {
    Route::post('brands', [ApiController::class, 'get_brands']);
    Route::post('portfolio', [ApiController::class, 'get_portfolio']);
    Route::post('developer', [ApiController::class, 'get_developer']);
    Route::post('contact_us', [ApiController::class, 'post_contact_us']);
    Route::post('setting', [ApiController::class, 'get_setting']);
});
