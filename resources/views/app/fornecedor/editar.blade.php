@extends('app.layouts.basico')
@section('Titulo', 'Fornecedores')
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedores - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action="{{route('app.fornecedor.editar', $id)}}" method="post">
                    @csrf
                    <input type="text" placeholder="Nome" value="{{old('nome') ?? $fornecedores->nome}}" name="nome" class="borda-preta">
                        {{$errors->has('nome') ? $errors->first('nome'):'';}}
                    <input type="text" placeholder="Site" value="{{old('site') ?? $fornecedores->site}}" name="site" class="borda-preta">
                        {{$errors->has('site') ? $errors->first('site'):'';}}
                    <input type="text" placeholder="UF" value="{{old('uf') ?? $fornecedores->uf}}" name="uf" class="borda-preta">
                        {{$errors->has('uf') ? $errors->first('uf'):'';}}
                    <input type="text" placeholder="E-mail" value="{{old('email') ?? $fornecedores->email}}" name="email" class="borda-preta">
                        {{$errors->has('email') ? $errors->first('email'):'';}}
                    <button type="submit" class="borda-preta">Alterar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
