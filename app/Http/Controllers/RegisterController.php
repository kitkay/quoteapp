<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    public function login(Request $request): JsonResponse
    {
        try {
//            $data = [
//                'email' => $request->email,
//                'password' => $request->password
//            ];

            if (auth()->attempt($request->only(['email', 'password']))) {
                $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                return response()->json([
                    'message' => 'Success',
                    'token' => $token
                ], 200);
            } else {
                return response()->json(['error' => 'Fail Login Attempt'], 403);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'error' => 'Unauthorised Login',
                'message' => $ex->getMessage(). ' - ' . $ex->getCode()
            ], 401);
        }
    }
}
