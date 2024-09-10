<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificationController;



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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/social-login', [AuthController::class, 'socialLogin']);
Route::get('/certifications', [CertificationController::class, 'index']);
Route::post('/certifications', [CertificationController::class, 'store']);
Route::get('/certifications/{id}', [CertificationController::class, 'show']);
Route::put('/certifications/{id}', [CertificationController::class, 'update']);
Route::delete('/certifications/{id}', [CertificationController::class, 'destroy']);


