<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use ResponseCode;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        try {
            $userRequest = $request->only([
                'email',
                'password'
            ]);

            if (!Auth::attempt($userRequest)) {
                return response()->json([
                    'message' => 'Invalid login details'
                ], ResponseCode::$errorCode['HTTP_ERROR_UNAUTHORIZED']);
            }

            $user = User::where('email', $request['email'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);

        } catch (Exception $ex) {
            return response()->json([
                'code' => ResponseCode::$errorCode['HTTP_ERROR_UNAUTHORIZED'],
                'message' => $ex,
            ], ResponseCode::$errorCode['HTTP_ERROR_UNAUTHORIZED']);
        }
    }
}
