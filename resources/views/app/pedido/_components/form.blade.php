<form action="{{isset($pedido->id)?route('pedido.update', $pedido->id):route('pedido.store');}}" method="post">
    @csrf
    @if (isset($pedido->id))
        @method('put')
    @endif

    <select name="cliente_id" class="borda-preta">
        <option value="">Selecione um Cliente:</option>
        @foreach ($Cliente as $key => $value)
            <option value="{{$value->id}}" {{($pedido->cliente_id ?? old('cliente_id')) == $value->id?'selected':'';}} value="{{$value->id}}">{{$value->nome}}</option>
        @endforeach
    </select>
        {{$errors->has('cliente_id') ? $errors->first('cliente_id'):'';}}
    <button type="submit" class="borda-preta">
        @if (isset($pedido->id))
            Editar                            
        @else
            Adicionar
        @endif
    </button>
</form>