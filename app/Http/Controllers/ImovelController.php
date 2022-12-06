<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Imovel;
use App\Models\TipoImovel;
use App\Models\User;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index(Request $request)
    {
        $query = Imovel::query();

        if ($request->has('nome') && $request->nome != (null || '')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->has('cidade') && $request->cidade != (null || '')) {
            $query->whereHas('cidades', function ($sq) use ($request) {
                $sq->where('nome', 'like', '%' . $request->cidade . '%');
            });
        }

        $imoveis = $query->get();
        return view('search', compact('imoveis'));
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome'           => 'required|string',
            'tipo_imovel_id' => 'required|string',
            'descricao'      => 'nullable|string',
            'cidade'         => 'required|string',
        ]);

        $imovel                 = Imovel::make($dadosValidados);
        $imovel->empresa_id     = User::where('remember_token', $request->_token)->first()->empresa_id;
        $imovel->tipo_imovel_id = TipoImovel::where('empresa_id', User::where('remember_token', $request->_token)->first()->empresa_id)
            ->where('id', $dadosValidados['tipo_imovel_id']);
        $imovel->cidade_id = Cidade::where('nome', 'like', '%' . $dadosValidados['cidade'] . '%')->first()->id;
        $imovel->save();

        return view('search');
    }

    public function show($id)
    {
        return view('', ['imovel' => Imovel::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $dadosValidados = $request->validate([
            'nome'           => 'nullable|string',
            'tipo_imovel_id' => 'nullable|string',
            'descricao'      => 'nullable|string',
            'cidade'         => 'nullable|string',
        ]);

        $imovel = Imovel::findOrFail($id)->update($dadosValidados);

        if ($request->has('tipo_imovel_id')) {
            $imovel->tipo_imovel_id = TipoImovel::where('empresa_id', User::where('remember_token', $request->_token)->first()->empresa_id)
                ->where('id', $dadosValidados['tipo_imovel_id']);
        }

        if ($request->has('cidade')) {
            $imovel->cidade_id = Cidade::where('nome', 'like', '%' . $dadosValidados['cidade'] . '%')->first()->id;

        }
        return view('search');
    }

    public function destroy($id)
    {
        $imovel = Imovel::findOrFail($id);

        if (!$imovel) {
            return response()->json([
                'data' => 'Não encontramos o imóvel selecionado',
            ]);
        }

        $imovel->delete();

        return response()->json([
            'data' => 'Imovel excluido com sucesso',
        ]);
    }

}
