<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntrarController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))){
            return redirect()
                ->back()
                ->withErrors('Usuário ou senha inválido');
        }
        return redirect('/user/home');
    }
}
