@extends('app.layouts.basico')
@section('Titulo', 'Produtos')
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos - Visualizar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <input type="text" placeholder="Nome" value="{{$produto->nome}}" readonly name="nome" class="borda-preta readonly">
                <input type="text" placeholder="Descrição" value="{{$produto->descricao}}" readonly name="descricao" class="borda-preta readonly">
                <input type="number" placeholder="Peso" value="{{$produto->peso}}" name="peso" readonly class="borda-preta readonly">
                <input type="text" name="unidade_id" value="{{$unidades->unidade}}" class="borda-preta readonly" readonly>
            </div>
        </div>
    </div>

@endsection
