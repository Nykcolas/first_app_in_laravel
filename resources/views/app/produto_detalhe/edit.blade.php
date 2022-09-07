@extends('app.layouts.basico')
@section('Titulo', 'Produtos Detalhe')
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos Detalhe - Editar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produtodetalhe.index')}}">Voltar</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            <h4>Produto</h4>
            <div>Nome : {{$produtodetalhe->produto->nome}}</div>
            <div>Descrição : {{$produtodetalhe->produto->descricao}}</div>
            <br>
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                @component('app.produto_detalhe._components.form', ['unidades' => $unidades, 'produtos' => $produtos, "produtodetalhe" => $produtodetalhe])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection
