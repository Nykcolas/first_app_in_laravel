@extends('app.layouts.basico')
@section('Titulo', 'Produtos')
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos - Editar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                @component('app.produto._components.form', ["produto" => $produto, 'fornecedor'=>$fornecedor, 'unidades' => $unidades])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection
