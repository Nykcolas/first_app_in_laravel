@extends('app.layouts.basico')
@section('Titulo', 'Cliente')
@section('content')
 <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Cliente - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('cliente.create')}}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto;">
                <table style = "width:100%;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cliente as $key => $value)
                            <tr>
                                <td>{{$value->nome}}</td>
                                <td><a href="{{ route('cliente.show', $value->id) }}">Visualizar</a></td>
                                <td><a href="{{ route('cliente.edit', $value->id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$value->id}}" action="{{ route('cliente.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a onclick="document.getElementById('form_{{$value->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>   
                        @empty
                            <tr>
                                <td colspan="4">Nem um Cliente Cadastrado</td>
                            </tr>   
                        @endforelse
                    </tbody>
                </table>

                {{ $cliente->appends($request)->links() }} <br>
                Exibindo {{$cliente->count()}} Cliente de {{$cliente->total()}} (de {{$cliente->firstItem()??'0'}} a {{$cliente->lastItem()??'0'}})
            </div>
        </div>
    </div>
@endsection
