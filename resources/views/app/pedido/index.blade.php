@extends('app.layouts.basico')
@section('Titulo', 'Pedido')
@section('content')
 <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.create')}}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto;">
                <table style = "width:100%;">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedido as $key => $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->Cliente->nome}}</td>
                                <td><a href="{{ route('pedidoproduto.create', $value->id) }}">Adicionar produtos</a></td>
                                <td><a href="{{ route('pedido.edit', $value->id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$value->id}}" action="{{ route('pedido.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a onclick="document.getElementById('form_{{$value->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>   
                        @empty
                            <tr>
                                <td colspan="4">Nem um pedido Cadastrado</td>
                            </tr>   
                        @endforelse
                    </tbody>
                </table>

                {{ $pedido->appends($request)->links() }} <br>
                Exibindo {{$pedido->count()}} pedido de {{$pedido->total()}} (de {{$pedido->firstItem()??'0'}} a {{$pedido->lastItem()??'0'}})
            </div>
        </div>
    </div>
@endsection
