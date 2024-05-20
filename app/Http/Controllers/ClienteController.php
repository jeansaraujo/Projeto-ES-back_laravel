<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all()->map(function ($cliente) {
            $cliente->nome = Crypt::decryptString($cliente->nome);
            $cliente->email = Crypt::decryptString($cliente->email);

            return $cliente;
        });

        return response()->json($clientes);
    }

    public function create(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nome = Crypt::encryptString($request->input('nome'));
        $cliente->email = Crypt::encryptString($request->input('email'));

        $cliente->save();

        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');

        return response()->json($cliente, 201);
    }

    public function recover($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        $cliente->nome = Crypt::decryptString($cliente->nome);
        $cliente->email = Crypt::decryptString($cliente->email);

        return response()->json($cliente);
    }

    public function update(Request $request)
    {
        $cliente = Cliente::find($request->id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        if ($request->has('nome')) {
            $cliente->nome = Crypt::encryptString($request->input('nome'));
        }
        if ($request->has('email')) {
            $cliente->email = Crypt::encryptString($request->input('email'));
        }

        $cliente->save();

        if ($request->has('nome')) {
            $cliente->nome = $request->input('nome');
        }
        if ($request->has('email')) {
            $cliente->email = $request->input('email');
        }

        return response()->json($cliente);
    }

    public function delete($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        $cliente->delete();
        return response()->json(['message' => 'Cliente deletado com sucesso']);
    }
}
