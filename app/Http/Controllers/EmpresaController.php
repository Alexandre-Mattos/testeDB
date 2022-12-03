<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Support\Facades\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        return Empresa::get();
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome'     => 'required|string',
            'cpf_cnpj' => 'required|string',
            'telefone' => 'required|string',
            'tipo'     => 'required|in:LTDA,PF',
        ]);

        $empresa = Empresa::create($dadosValidados);

        return $empresa;
    }
    public function show($id)
    {
        return Empresa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $dadosValidados = $request->validate([
            'nome'     => 'required|string',
            'cpf_cnpj' => 'required|string',
            'telefone' => 'required|string',
            'tipo'     => 'required|in:LTDA,PF',
        ]);

        $empresa = Empresa::findOrFail($id);

        $empresa->update($dadosValidados);

        return $empresa;
    }

    public function destroy($id)
    {
        return Empresa::findOrFail($id)->delete();
    }
}
