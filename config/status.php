<?php

/**
 * HTTP Response Status Code
 */
class ResponseCodes {

    public static $errorCodeMessage = [
        // Redirection Error Message
        300 => 'Multiple Choice',
        301 => 'Moved Permanently',
        302 => 'Found',

        // Client Error Response
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        408 => 'Request Timeout',
        410 => 'Gone',
        418 => 'I\'m a teapot.',
        422 => 'Unprocessable Entity',
        429 => 'Too Many Request',

        // Server Error Message
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        507 => 'Insufficient Storage',

    ];

    public static $successCodeMessage = [
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        20 => 'Created',
    ];
}
