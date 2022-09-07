<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function index(Request $request) {
        $erro = "";

        if ($request->get('erro') == 1) {
            $erro = "Usuário ou senha não existem";
        }

        if ($request->get('erro') == 2) {
            $erro = "Usuario não autenticado";
        }

        return view('site.login', ['titulo'=>'login', 'erro'=> $erro]);
    }

    public function autenticar(Request $request) {
        $regras = [
            "usuario" => 'email',
            "senha" => 'required'
        ];

        $parametros = [
            "email" => "Insira um E-mail válido",
            "senha.required" => "Insira sua senha"
        ];

        $request->validate($regras, $parametros);
        $email = $request->get('usuario');
        $password = $request->get('senha');
        $user = new User();
        $Usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        if (isset($Usuario->name)) {
            session_start();
            $_SESSION['nome'] = $Usuario->name;
            $_SESSION['email'] = $Usuario->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro'=>1]);
        }
    }

    public function Sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
