<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Predis\Response\Status;

class UserAPIController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email:rfc,dns|exists:users',
            'password' => 'required',
        ];

        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response(
                [
                    'Message' => 'Validation faild',
                    'Errors' => $validation->messages()
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $user      = User::where('email', $request->email)->first();
        $userPass  = Hash::check($request->password, $user->password);
        $token = $user->createToken('token')->plainTextToken;

        if ($user && $userPass) {
            return response()->json([
                'Message' => 'Login Success',
                'User' => $user,
                'Token' => $token
            ], Response::HTTP_ACCEPTED);
        }

        return response()->json([
            'Message' => 'Error Check Your Data'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
