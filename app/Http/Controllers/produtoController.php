<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class produtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $produtos = Item::with('ItemDetalhe', 'fornecedor', "pedidos")->paginate(10);
        Paginator::useBootstrap();
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedor = Fornecedor::all();
        return view('app.produto.create', ["unidades" => $unidades, 'fornecedor' => $fornecedor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'peso' => 'required|integer',
            'descricao' => 'min:2|max:100',
            'unidade_id' => 'required|exists:unidades,id',
            'fornecedor_id' => 'required|exists:fornecedores,id'
        ];

        $mensagens = [
            'required' => "O Campo :attribute Precisa ser preenchido!",
            'min' => "O Valor minimo admitido é 2!",
            'max' => "O Valor máximo admitido é 2!",
            'unidade_id.required' => 'Selecione uma unidade de medida',
            'fornecedor_id.required' => 'Selecione um fornecedor',
        ];

        $request->validate($regras, $mensagens);
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $unidades = Unidade::find($produto->unidade_id);
        $fornecedor = Fornecedor::find($produto->fornecedor_id);
        return view('app.produto.show', ["produto" => $produto, 'unidades' => $unidades, "fornecedor"=> $fornecedor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedor = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.edit', ["produto" => $produto, 'fornecedor'=> $fornecedor, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $regras = [
            'nome' => 'required',
            'peso' => 'required|integer',
            'descricao' => 'min:2|max:100',
            'unidade_id' => 'required|exists:unidades,id',
            'fornecedor_id' => 'required|exists:fornecedores,id'
        ];

        $mensagens = [
            'required' => "O Campo :attribute Precisa ser preenchido!",
            'min' => "O Valor minimo admitido é 2!",
            'max' => "O Valor máximo admitido é 2!",
            'fornecedor_id.required' => 'Selecione um fornecedor',
            'unidade_id.required' => 'Selecione uma unidade de medida'
        ];

        $request->validate($regras, $mensagens);
        $ret = $produto->update($request->all());
        if ($ret) {
            return redirect()->route('produto.index');
        } else {
            return redirect()->route('produto.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        if($produto->delete()) {
            return redirect()->route('produto.index');
        }
    }
}
