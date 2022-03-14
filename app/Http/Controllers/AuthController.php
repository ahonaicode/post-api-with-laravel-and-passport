<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        $token = $user->createToken('API Token')->accessToken;
        return response([ 'user' => $user, 'token' => $token], 201);
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->all())) {
            return response(['error_message' => 'Incorrect Details. 
            Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token]);
    }

    public function logout(Request $request)
    {
        auth('api')->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
