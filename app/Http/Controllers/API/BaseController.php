<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    public function sendResponse (
        array $result,
        string $message
    ) {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($response, 200);
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
        array $errorMsg = [],
        int $code = 404
    ) {
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
