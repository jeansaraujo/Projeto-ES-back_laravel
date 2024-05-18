<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Usuario nao encontrado'], 404);
        }

        if ($user->password != $request->password) {
            return response()->json(['message' => 'Senha incorreta'], 422);
        }

        return response('', 200);

    }
}
