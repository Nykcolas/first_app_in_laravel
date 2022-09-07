<form action="{{isset($cliente->id)?route('cliente.update', $cliente->id):route('cliente.store');}}" method="post">
    @csrf
    @if (isset($cliente->id))
        @method('put')
    @endif
    <input type="text" placeholder="Nome" value="{{$cliente->nome ?? old('nome')}}" name="nome" class="borda-preta">
        {{$errors->has('nome') ? $errors->first('nome'):'';}}
    <button type="submit" class="borda-preta">
        @if (isset($cliente->id))
            Editar                            
        @else
            Adicionar
        @endif
    </button>
</form>