<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siteContato;
use App\Models\MotivoContato;

class contatoContrller extends Controller {
    public function Contato() {
        $arrOptions = MotivoContato::all();
        return view('site/contato', ["arrOptions" => $arrOptions]);
    }

    public function Salvar(Request $request) {
        // dd($request->all());
        $rules = ['nome' => "required|min:3|max:50|unique:site_contatos",
                  'telefone' => "required",
                  'email' => "email",
                  'motivo_contato_id' => "required",
                  'mensagem' => "required"];

        $params = ["required"=>"O Campo precisa :attribute ser preenchido!",
                   "nome.min"=>"É exigido no minimo 3 caracteres!",
                   "nome.max"=>"É exigido no Maximo 50 caracteres!",
                   "nome.unique"=>"O nome informado já está em uso",
                   "email.email"=>"O Campo email precisa ser preenchido com um email valido!"];
                   
        $request->validate($rules, $params);
        siteContato::create($request->all());
    }
}
