<?php

use App\Helpers\ApiResponse;
use App\Http\Controllers\Api\AuthController;
use App\Http\Resources\Api\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/me', function (Request $request) {
        return ApiResponse::success(
            data: new UserResource($request->user()),
            message: 'User data retrieved successfully'
        );

    });
Route::post('/logout', function (Request $request) {

    $request->user()->currentAccessToken()->delete();

    return ApiResponse::success(
        message: 'Logout successful'
        );
    });
});
