<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function recover($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuário nao encontrado'], 404);
        }
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return response()->json(['message' => 'Usuario nao encontrado'], 404);
        }
        $user->update($request->all());
        return response()->json($user);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario nao encontrado'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'Usuario deletado com sucesso']);
    }

}
