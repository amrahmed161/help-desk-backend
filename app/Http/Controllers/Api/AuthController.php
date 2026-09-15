<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserRole;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
             'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => UserRole::CUSTOMER,
    ]);
    $token = $user->createToken('auth_token')->plainTextToken;
    return ApiResponse::success(
        data: [
            'user' => new UserResource($user),
            'token' => $token,
        ],
        message: 'Registration successful',
        statusCode: 201
    );
    }
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if(! $user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return ApiResponse::success(
        data: [
            'user' => new UserResource($user),
            'token' => $token,
        ],
        message: 'Login successful',
          );
    }
}
