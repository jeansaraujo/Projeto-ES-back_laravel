<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function create(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }
    public function recover($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente nao encontrado'], 404);
        }
        return response()->json($cliente);
    }
    public function update(Request $request)
    {
        $cliente = Cliente::find($request->id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente nao encontrado'], 404);
        }
        $cliente->update($request->all());
        return response()->json($cliente);
    }
    public function delete($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente nao encontrado'], 404);
        }
        $cliente->delete();
        return response()->json(['message' => 'Cliente deletado com sucesso']);
    }
}
