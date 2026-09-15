<?php
namespace App\Helpers;

class ApiResponse
{
    public static function success(
        mixed $data = null,
        string $message = 'Success',
        int $statusCode = 200
    ){
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
    public static function error(
        string $message = 'Something went wrong',
        int $statusCode = 400,
        mixed $errors = null
    ){
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $statusCode);
    }
}

