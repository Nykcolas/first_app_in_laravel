<?php

namespace App\Http\Controllers;

use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param \App\Models\Pedido
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $Pedido)
    {
        $produtos = Produto::all();
        return view('app.pedidoproduto.create', ['produtos' => $produtos, "Pedido" => $Pedido]);
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Models\Pedido
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $Pedido)
    {
        $regras = [
            "produto_id" => "required|exists:produtos,id",
            "quantidade" => "required"
        ];

        $mensagens = [
            "quantidade.required"=>"O campo quntidade deve ser preenchido",
            "produto_id.required" => "Escolha um produto",
            "produto_id.exists" => "O produto escolhido não está disponivel no momento"
        ];

        $request->validate($regras, $mensagens);

        $Pedido->produtos()->attach($request->get('produto_id'), ['quantidade'=>$request->get('quantidade')]);
        return redirect()->route("pedidoproduto.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido, Produto $produto)
    {
        $pedido->produtos()->detach($produto->id);
        return redirect()->route("pedidoproduto.create", $pedido->id);
    }
}
