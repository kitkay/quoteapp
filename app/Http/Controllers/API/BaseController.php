<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class BaseController extends Controller
{
    /**
     * Send Success Response
     *
     * @param array $result
     * @param string $message
     *
     * @return JsonResponse
     */
    public function sendResponse(
        array  $collection,
        string $message = ''
    ): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $collection,
            'message' => $message
        ];

        return response()->json(
            $response,
            200,
            [],
            JSON_PRETTY_PRINT);
    }

    /**
     * Send Error  Response
     *
     * @param string $error
     * @param array $errorMsg
     * @param int $code
     *
     * @return JsonResponse
     */
    public function sendError(
        string $error,
        array  $errorMsg = [],
        int    $code = 404
    )
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if (!empty($errorMsg)) {
            $response['data'] = $errorMsg;
        }

        return response()->json($response, $code);
    }
}
