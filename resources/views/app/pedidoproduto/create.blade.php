@extends('app.layouts.basico')
@section('Titulo', 'Pedido de Produtos')
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido de Produtos - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <h4>Itens do pedido</h4>
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Produto</th>
                            <th>Data de Inclusão</th>
                            <th>Quantidade</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Pedido->produtos as $key => $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td>{{$val->nome}}</td>
                                <td>{{$val->pivot->created_at->format('d/m/Y')}}</td>
                                <td>{{$val->pivot->quantidade}}</td>
                                <td>
                                    <form id="form_{{$Pedido->id}}_{{$val->id}}" action="{{route("pedidoproduto.destroy", ["pedido" => $Pedido->id, "produto"=>$val->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a onclick="document.getElementById('form_{{$Pedido->id}}_{{$val->id}}').submit()">Deletar</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedidoproduto._components.form', ['produtos'=>$produtos, "idPedido" => $Pedido->id])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection
