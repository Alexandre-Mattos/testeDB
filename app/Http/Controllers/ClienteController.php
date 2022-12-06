<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $clientes = Cliente::query();

        if ($request->has('nome')) {
            $clientes->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->has('cpf')) {
            $clientes->where('cpf', $request->cpf);
        }

        return $clientes->get();
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome'  => 'required|string',
            'email' => 'required|string',
            'cpf'   => 'required|string',
        ]);

        $dadosValidados['empresa_id'] = User::where('remember_token', $request->_token)->first()->empresa_id;
        $cliente                      = Cliente::create($dadosValidados);

        return $cliente;
    }

    public function show($id)
    {
        return Cliente::findOrFail($id);

    }

    public function update(Request $request, $id)
    {
        $dadosValidados = $request->validate([
            'nome'  => 'required|string',
            'email' => 'required|string',
            'cpf'   => 'required|string',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->update($dadosValidados);

        return $cliente;
    }

    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();

        return response()
            ->json([
                'data' => "O cliente  foi excluido!",
            ]);
    }
}
