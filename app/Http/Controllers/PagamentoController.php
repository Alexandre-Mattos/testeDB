<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\User;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index(Request $request)
    {
        $query = Pagamento::query();

        if ($request->has('status') && $request->status != (null || '')) {
            $query->where('status', $request->status);
        }

        return $query->get();
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'valor'    => 'required|float',
            'conta_id' => 'required|integer',
        ]);

        $pagamento                 = Pagamento::make($dadosValidados);
        $pagamento->empresa_id     = User::where('remember_token', $request->_token)->first()->empresa_id;
        $pagamento->status         = 'sucesso';
        $pagamento->data_pagamento = today();
        $pagamento->save();

        $pagamento->contas()->update([
            'valor'  => 0,
            'status' => 'paga',
        ]);

        return response()->json([
            'data' => 'Conta paga com sucesso',
        ]);

    }

}
