<?php

/**
 * HTTP Response Status Codes
 */
class ResponseCode
{
    public static $errorCode = [
        // Redirection Error CODE
        'HTTP_ERROR_MULTIPLE_CHOICE' => 300,
        'HTTP_ERROR_MOVED_PERMANENTLY' => 301,
        'HTTP_ERROR_FOUND' => 302,

        // Client Error CODE
        'HTTP_ERROR_BAD_REQUEST' => 400,
        'HTTP_ERROR_UNAUTHORIZED' => 401,
        'HTTP_ERROR_PAYMENT_REQUIRED' => 402,
        'HTTP_ERROR_FORBIDDEN' => 403,
        'HTTP_ERROR_NOT_FOUNC' => 404,
        'HTTP_ERROR_METHOD_NOT_ALLOWED' => 405,
        'HTTP_ERROR_REQUEST_TIMEOUT' => 408,
        'HTTP_ERROR_GONE' => 410,
        'HTTP_ERROR_IM_A_TEAPOT' => 418,
        'HTTP_ERROR_UNPROCESSABLE_ENTITY' => 422,
        'HTTP_ERROR_TOO_MANY_REQUEST' => 429,

        // Server Error CODE
        'HTTP_ERROR_INTERNAL_SERVER_ERROR' => 500,
        'HTTP_ERROR_NOT_IMPLEMENTED' => 501,
        'HTTP_ERROR_BAD_GATEWAY' => 502,
        'HTTP_ERROR_SERVICE_UNAVAILABLE' => 503,
        'HTTP_ERROR_INSUFFICIENT_STORAGE' => 507,
    ];

    public static $successCode = [
        'HTTP_SUCCESS_OK' => 200,
        'HTTP_SUCCESS_CREATED' => 201,
        'HTTP_SUCCESS_ACCEPTED' => 202
    ];
}
