<form action="{{route('pedidoproduto.store', $idPedido);}}" method="post">
    @csrf
    <select name="produto_id" class="borda-preta">
        <option value="">Selecione o Produto:</option>
        @foreach ($produtos as $key => $value)
            <option value="{{$value->id}}" {{old('produto_id') == $value->id?'selected':'';}}>{{$value->nome}}</option>
        @endforeach
    </select>
        {{$errors->has('produto_id') ? $errors->first('produto_id'):'';}}
    <input type="number" name="quantidade" placeholder="Quantidade" value="{{old('quantidade')}}" class="borda-preta">
        {{$errors->has('quantidade') ? $errors->first('quantidade'):'';}}
    <button type="submit" class="borda-preta">
        Adicionar
    </button>
</form>