<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $user = User::query()
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if (!$user) {
            return response()->json([
                'data' => 'Nenhum usuário encontrado com essas credenciais',
            ]);
        }

        return view('search');
    }
}
