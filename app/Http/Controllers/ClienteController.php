<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ClienteController extends Controller
{
    public function index(FacadesRequest $request)
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

    public function store(FacadesRequest $request)
    {
        $dadosValidados = $request->validate([
            'nome'  => 'required|string',
            'email' => 'required|string',
            'cpf'   => 'required|string',
        ]);

        $cliente = Cliente::create($dadosValidados);

        return $cliente;
    }

    public function show($id)
    {
        return Cliente::findOrFail($id);

    }

    public function update(FacadesRequest $request, $id)
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
