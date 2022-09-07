<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtodetalhe = ProdutoDetalhe::with('produto')->paginate(10);
        Paginator::useBootstrap();
        return view('app.produto_detalhe.index', ["produtodetalhe" => $produtodetalhe, "request" => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades, 'produtos' => $produtos]);
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
            'prudoto_id' => 'required|exists:produtos,id',
            'comprimento' => 'required|numeric',
            'largura' => 'required|numeric',
            'altura' => 'required|numeric',
            'unidade_id' => 'required|exists:unidades,id'
        ];

        $mensagens = [
            'required' => "O Campo :attribute Precisa ser preenchido!",
            'min' => "O Valor minimo admitido é 2!",
            'max' => "O Valor máximo admitido é 2!",
            'unidade_id.required' => 'Selecione uma Unidade de medida',
            'prudoto_id.required' => 'Selecione uma Produto',
            "numeric"=> ":attribute deve ser um valor numerico"
        ];

        $request->validate($regras, $mensagens);
        $retorno = ProdutoDetalhe::create($request->all());
        if ($retorno) {
            return redirect()->route('produtodetalhe.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtodetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produtodetalhe)
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();
        return view('app.produto_detalhe.edit', ['unidades' => $unidades, 'produtos' => $produtos, "produtodetalhe" => $produtodetalhe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutoDetalhe  $produtodetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtodetalhe)
    {
        $regras = [
            'prudoto_id' => 'required|exists:produtos,id',
            'comprimento' => 'required|numeric',
            'largura' => 'required|numeric',
            'altura' => 'required|numeric',
            'unidade_id' => 'required|exists:unidades,id'
        ];

        $mensagens = [
            'required' => "O Campo :attribute Precisa ser preenchido!",
            'min' => "O Valor minimo admitido é 2!",
            'max' => "O Valor máximo admitido é 2!",
            'unidade_id.required' => 'Selecione uma Unidade de medida',
            'prudoto_id.required' => 'Selecione uma Produto',
            "numeric" => ":attribute deve ser um valor numerico"
        ];

        $request->validate($regras, $mensagens);
        $ret = $produtodetalhe->update($request->all());
        if ($ret) {
            return redirect()->route('produtodetalhe.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
