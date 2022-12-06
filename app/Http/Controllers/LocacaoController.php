<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    public function index(Request $request)
    {
        $query = Locacao::query();

        if ($request->has('id') && $request->id != (null || '')) {
            $query->findOrFail($request->id);
        }

        return view('');
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'imovel_id'       => 'required|integer',
            'inquilino_id'    => 'required|integer',
            'proprietario_id' => 'required|integer',
            'inicio_periodo'  => 'required|date',
            'fim_periodo'     => 'required|date',
            'valor'           => 'required|float',
            'data_vencimento' => 'required|date',
        ]);

        $locacao             = Locacao::make($dadosValidados);
        $locacao->status     = 'Ativa';
        $locacao->duracao    = Carbon::parse($dadosValidados['inicio_periodo'])->diffInMonths($dadosValidados['fim_periodo']);
        $locacao->empresa_id = User::where('remember_token', $request->_token)->first()->empresa_id;
        $locacao->save();

        $locacao->imovel()->update([
            'status' => 'Locado',
        ]);

        $locacao->inquilinos()->sync($dadosValidados['inquilino_id']);
        $locacao->proprietarios()->sync($dadosValidados['proprietario_id']);

        for ($i = 0; $i <= $locacao->duracao; $i++) {
            $locacao->contas()->create([
                'empresa_id'      => User::where('remember_token', $request->_token)->first()->empresa_id,
                'locacao_id'      => $locacao->id,
                'valor'           => $locacao->valor,
                'data_vencimento' => $locacao->contas()->count() > 0 ? Carbon::parse($dadosValidados['data_vencimento']) : Carbon::parse($dadosValidados['data_vencimento'])->addMonth($i),
                'tipo'            => 'recebimento',
                'status'          => 'em_aberto',
            ]);

            $locacao->contas()->create([
                'empresa_id'      => User::where('remember_token', $request->_token)->first()->empresa_id,
                'locacao_id'      => $locacao->id,
                'valor'           => $locacao->valor,
                'data_vencimento' => $locacao->contas()->count() > 0 ? Carbon::parse($dadosValidados['data_vencimento']) : Carbon::parse($dadosValidados['data_vencimento'])->addMonth($i),
                'tipo'            => 'pagamento',
                'status'          => 'em_aberto',
            ]);
        }

    }

    public function show($id)
    {
        $locacao = Locacao::findOrFail($id);
        return response()->json([
            'locacao'      => $locacao,
            'imovel'       => $locacao->imovel,
            'inquilino'    => $locacao->inquilinos()->first(),
            'proprietario' => $locacao->proprietarios()->first(),
            'contas'       => $locacao->contas,
        ]);
    }

    public function destroy($id)
    {
        $locacao = Locacao::findOrFail($id);

        if (!$locacao) {
            return response()->json([
                'data' => 'Não encontramos a locação selecionada selecionado',
            ]);
        }

        $locacao->delete();

        return response()->json([
            'data' => 'Locacao excluida com sucesso',
        ]);
    }
}
