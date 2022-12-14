<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Venda::query();

        $query->join('imovel as I', 'venda.imovel_id', '=', 'I.id');
        $query->join('cliente as C', 'venda.cliente_id', '=', 'C.id');
        $query->join('cidade as CID', 'I.cidade_id', '=', 'CID.id');

        $query->where('venda.valor', '>=', $request->valor);

        if ($request->input('query') == 2) {
            $query->select('I.nome as nome_imovel', 'CID.nome as cidade', 'C.nome as cliente', 'valor', 'data_compra');

        }

        if ($request->input('query') == 1) {
            $query->select(\DB::raw('SUM(venda.valor) as valor'), 'CID.nome')->groupBy('CID.nome');
        }

        return $query->get();
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
