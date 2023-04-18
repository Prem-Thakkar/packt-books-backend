<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $findUser = AdminUser::whereEmail($request->email)->first();
        if (empty($findUser)) {
            return response()->json(['error' => 'Email not found'], 422);
        }

        if (!Hash::check($request->password, $findUser->password)) {
            return response()->json(['error' => 'Wrong credentials.'], 422);
        }

        $findUser->token = Str::random(50);
        $findUser->save();
        return response()->json(['data' => $findUser->token], 200);
    }

    public function logout()
    {
        $findUser = AdminUser::first();
        $findUser->token = '';
        $findUser->save();

        return response()->json(['message' => 'Logged out Successfully.'], 200);
    }
}
