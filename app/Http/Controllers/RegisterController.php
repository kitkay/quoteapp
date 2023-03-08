<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request)
    {
        $user = new User();

        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Login user
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(RegisterRequest $request)
    {
        $request = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($request)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json([
                'token' => $token
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
