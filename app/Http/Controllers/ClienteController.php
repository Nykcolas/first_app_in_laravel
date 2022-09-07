<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cliente = Cliente::paginate(5);
        return view("app.cliente.index", ['cliente'=>$cliente, "request"=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("app.cliente.create");
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
            "nome" => "required|min:3|max:50"
        ];
        $mensagens = [
            "required"=> "O campo :attribute deve ser preenchido"
        ];

        $request->validate($regras, $mensagens);
        Cliente::create($request->all());
        return redirect()->route('cliente.index');
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
     * @param  \App\Models\Cliente  $Cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $Cliente)
    {
        return view('app.cliente.edit', ['Cliente' => $Cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $Cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $Cliente)
    {
        $regras = [
            "nome" => "required|min:3|max:50"
        ];
        $mensagens = [
            "required" => "O campo :attribute deve ser preenchido"
        ];

        $request->validate($regras, $mensagens);
        $Cliente->update($request->all());
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $Cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $Cliente)
    {
        $Cliente->delete();
        return redirect()->route('cliente.index');
    }
}
