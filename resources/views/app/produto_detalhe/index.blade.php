@extends('app.layouts.basico')
@section('Titulo', 'Produtos Detalhe')
@section('content')
 <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos Detalhe - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produtodetalhe.create')}}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:fit-content; margin-left:auto; margin-right:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th>Unidade</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produtodetalhe as $key => $value)
                            <tr>
                                <td>{{$value->produto->nome}}</td>
                                <td>{{$value->produto->descricao}}</td>
                                <td>{{$value->comprimento}}</td>
                                <td>{{$value->largura}}</td>
                                <td>{{$value->altura}}</td>
                                <td>{{$value->unidade_id}}</td>
                                <td><a href="{{ route('produtodetalhe.show', $value->id) }}">Visualizar</a></td>
                                <td><a href="{{ route('produtodetalhe.edit', $value->id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$value->id}}" action="{{ route('produtodetalhe.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a onclick="document.getElementById('form_{{$value->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>   
                        @empty
                            <tr>
                                <td colspan="7">Nem um Produto Cadastrado</td>
                            </tr>   
                            
                        @endforelse
                    </tbody>
                </table>

                {{ $produtodetalhe->appends($request)->links() }} <br>
                Exibindo {{$produtodetalhe->count()}} Detalhes de Produtos de {{$produtodetalhe->total()}} (de {{$produtodetalhe->firstItem()}} a {{$produtodetalhe->lastItem()}})
            </div>
        </div>
    </div>
@endsection
