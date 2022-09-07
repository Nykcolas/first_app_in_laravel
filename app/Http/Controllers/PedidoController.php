<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedido = Pedido::with('Cliente')->paginate(5);
        return view('app.pedido.index', ["pedido"=>$pedido, "request"=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cliente = Cliente::all();
        return view('app.pedido.create', ["Cliente" => $Cliente]);
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
            'cliente_id' => 'required|exists:clientes,id'
        ];

        $mensagens = [
            'cliente_id.required' => 'Selecione um Cliente',
        ];

        $request->validate($regras, $mensagens);
        Pedido::create($request->all());
        return redirect()->route('pedido.index');
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
     * @param  \App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $Cliente = Cliente::all();
        return view('app.pedido.edit', ['Cliente' => $Cliente, "pedido"=> $pedido]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $regras = [
            'cliente_id' => 'required|exists:clientes,id'
        ];

        $mensagens = [
            'cliente_id.required' => 'Selecione um Cliente',
        ];

        $request->validate($regras, $mensagens);
        $pedido->update($request->all());
        return redirect()->route('pedido.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedido.index');
    }
}
