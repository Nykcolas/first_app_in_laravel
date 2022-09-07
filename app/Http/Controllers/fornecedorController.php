<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class fornecedorController extends Controller {
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedorescadastrados = Fornecedor::with('Produtos')
                                             ->where('nome', 'like', '%'.$request->input('nome').'%')
                                             ->where('site', 'like', '%'.$request->input('site').'%')
                                             ->where('uf', 'like', '%'.$request->input('uf').'%')
                                             ->where('email', 'like', '%'.$request->input('email').'%')
                                             ->paginate(5);
        Paginator::useBootstrap();
        return view('app.fornecedor.listar', ['fornecedorescadastrados'=> $fornecedorescadastrados, 'request'=> $request->all()]);
    }

    public function adicionar(Request $request) {
        if ($request->input('_token') != "") {
            $regras = [
                'nome' => 'required|unique:fornecedores',
                'site' => 'required|unique:fornecedores',
                'uf' => 'min:2|max:2',
                'email' => 'email'
            ];

            $mensagens = [
                'required' => "O Campo :attribute Precisa ser preenchido!",
                'min' => "O Valor minimo admitido é 2!",
                'max' => "O Valor máximo admitido é 2!",
                'email' => "Insira um E-mail válido!",
                'unique' => "Este :attribute do fornecedor já foi cadastrado"
            ];

            $request->validate($regras, $mensagens);
            Fornecedor::create($request->all());
            return redirect()->route('app.fornecedor.listar');
        }

        return view('app.fornecedor.adicionar');
    }

    public function editar($id, Request $request) {
        $obj = Fornecedor::find($id);
        if ($request->input('_token') != "") {
            $regras = [
                'nome' => 'required|unique:fornecedores',
                'site' => 'required',
                'uf' => 'min:2|max:2',
                'email' => 'email'
            ];

            $mensagens = [
                'required' => "O Campo :attribute Precisa ser preenchido!",
                'min' => "O Valor minimo admitido é 2!",
                'max' => "O Valor máximo admitido é 2!",
                'email' => "Insira um E-mail válido!",
                'unique' => "Este :attribute do fornecedor já foi cadastrado"
            ];
            $request->validate($regras, $mensagens);
            $obj->update($request->all());
            return redirect()->route('app.fornecedor.listar');

        }
        return view('app.fornecedor.editar', ['id'=> $request->id, 'fornecedores'=>$obj]);
    }

    public function excluir($id) {
        $obj = Fornecedor::find($id);
        $ret = $obj->delete();
        if ($ret) {
            return redirect()->route('app.fornecedor.listar');
        }
    }
}
