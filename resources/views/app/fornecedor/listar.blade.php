@extends('app.layouts.basico')
@section('Titulo', 'Fornecedores')
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedores - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:fit-content; margin-left:auto; margin-right:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>E-mail</th>
                            <th>UF</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fornecedorescadastrados as $key => $value)
                            <tr>
                                <td>{{$value->nome}}</td>
                                <td>{{$value->site}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->uf}}</td>
                                <td><a href="{{route('app.fornecedor.editar', $value->id)}}">Editar</a></td>
                                <td><a href="{{route('app.fornecedor.excluir', $value->id)}}">Excluir</a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de Produtos</p>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($value->produtos as $key => $arr)
                                                <tr>
                                                    <td>{{$arr->id}}</td>
                                                    <td>{{$arr->nome}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr> 
                        @empty
                            <tr>
                                <td colspan="6">Nem um Fornecedor Cadastrado</td>
                            </tr>   
                            
                        @endforelse
                    </tbody>
                </table>

                {{ $fornecedorescadastrados->appends($request)->links() }} <br>
                Exibindo {{$fornecedorescadastrados->count()}} Fornecedores de {{$fornecedorescadastrados->total()}} (de {{$fornecedorescadastrados->firstItem()}} a {{$fornecedorescadastrados->lastItem()}})
            </div>
        </div>
    </div>

@endsection
