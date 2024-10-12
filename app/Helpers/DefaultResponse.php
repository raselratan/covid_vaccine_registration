<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class DefaultResponse
{
    public static function success($data = null, int $statusCode = 200): JsonResponse
    {
        $response = [
            'success' => true,
            'status' => $statusCode,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }

    public static function error(string $message, int $statusCode = 500): JsonResponse
    {
        return response()->json([
            'success' => false,
            'status' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }
}
