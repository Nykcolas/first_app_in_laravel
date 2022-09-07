@extends('app.layouts.basico')
@section('Titulo', 'Produtos')
@section('content')
 <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto;">
                <table style = "width:100%;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Nome do Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produtos as $key => $value)
                            <tr>
                                <td>{{$value->nome}}</td>
                                <td>{{$value->descricao}}</td>
                                <td>{{$value->peso}}</td>
                                <td>{{$value->Fornecedor->nome}}</td>
                                <td>{{$value->Fornecedor->site}}</td>
                                <td>{{$value->unidade_id}}</td>
                                <td>{{$value->ItemDetalhe->comprimento ?? ""}}</td>
                                <td>{{$value->ItemDetalhe->largura ?? ""}}</td>
                                <td>{{$value->ItemDetalhe->altura ?? ""}}</td>
                                <td><a href="{{ route('produto.show', $value->id) }}">Visualizar</a></td>
                                <td><a href="{{ route('produto.edit', $value->id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$value->id}}" action="{{ route('produto.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a onclick="document.getElementById('form_{{$value->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach ($value->pedidos as $item)
                                        <a target="_blank" href="{{route("pedidoproduto.create", ["pedido"=>$item->id])}}">{{$item->id}}</a>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12">Nem um Produto Cadastrado</td>
                            </tr>   
                            
                        @endforelse
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links() }} <br>
                Exibindo {{$produtos->count()}} Produtos de {{$produtos->total()}} (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
            </div>
        </div>
    </div>
@endsection
