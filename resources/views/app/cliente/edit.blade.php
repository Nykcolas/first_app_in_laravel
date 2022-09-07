@extends('app.layouts.basico')
@section('Titulo', 'Cliente')
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Cliente - Editar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('cliente.index')}}">Voltar</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                @component('app.cliente._components.form', ['cliente'=>$Cliente])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection
