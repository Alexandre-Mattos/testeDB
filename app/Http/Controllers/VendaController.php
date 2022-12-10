<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Venda::query()
            ->whereHas('imovel', function ($sq) use ($request) {
                $sq->where('empresa_id', User::where('remeber_token', $request->_token)->first()->empresa_id);
            });

        if ($request->valor) {
            $query->where('valor', '>=', $request->valor);
        }

        if ($request->data_compra) {
            $query->where('data_compra', $request->data_compra);
        }

        $query = $query->get();

        return response()->json([
            'data' => $query,
        ]);
    }

    public function store(Request $request)
    {
        $venda = Venda::create($request);
        $venda->imovel()->update([
            'status' => 'Vendido',
        ]);

        return response()->json([
            'data' => $venda,
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'data' => Venda::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $venda = Venda::finrOrFail($id);
        $venda->update($request);

        return response()->json([
            'data' => $venda,
        ]);
    }

    public function destroy($id)
    {
        $venda = Venda::findOrFail($id)->delete();

        return response()->json([
            'data' => $venda,
        ]);
    }
}
