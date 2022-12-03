<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AuthController extends Controller
{
    public function index(FacadesRequest $request)
    {
        $user = User::query()
            ->where('email', $request->email)
            ->where('password', $request->senha)
            ->first();

        if (!$user) {
            return response()->json([
                'data' => 'Nenhum usuário encontrado com essas credenciais',
            ]);
        }

        return view();
    }
}
