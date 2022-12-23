<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestApi\AuthController;
use App\Http\Controllers\RestApi\TeacherAssignedController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/student/register', [AuthController::class, 'StudentRegister']);
Route::post('/student/login', [AuthController::class, 'StudentLogin']);
Route::middleware('auth:api')->group(function () {
    Route::get('/user/details', [AuthController::class, 'UserDetails']);
    Route::put('/user/profile/update', [AuthController::class, 'UserProfileUpdate']);
    Route::post('/teacher/assignment', [TeacherAssignedController::class, 'assignTeacher']);
});
