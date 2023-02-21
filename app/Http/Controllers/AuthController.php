<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

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
                ], 401);
            }

            $user = User::where('email', $request['email'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);

        } catch (Exception $ex) {
            return response()->json([
                'code' => 401,
                'message' => $ex,
            ], 401);
        }
    }
}
