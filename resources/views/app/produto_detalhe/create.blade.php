@extends('app.layouts.basico')
@section('Titulo', 'Detalhe do Produtos ')
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhe do Produtos - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produtodetalhe.index')}}">Voltar</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                @component('app.produto_detalhe._components.form', ['unidades' => $unidades, 'produtos' => $produtos])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection
