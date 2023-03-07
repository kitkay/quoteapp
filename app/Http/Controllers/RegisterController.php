<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user->name = $input['name'];
        $user->password = $input['password'];
        $user->email = $input['email'];
        $user->save();

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login user
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;

            return $this->sendResponse(
                $success,
                'User login successfully.'
            );

        } else {
            return $this->sendError(
                trans('Unauthorised.'),
                [ 'error' => 'Unauthorised' ]
            );
        }
    }
}
