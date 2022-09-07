<form action="{{isset($produtodetalhe->id) ? route('produtodetalhe.update', $produtodetalhe->id): route('produtodetalhe.store');}}" method="post">
    @csrf
    @if (isset($produtodetalhe->id))
        @method('put')
    @endif
    <select name="produto_id" class="borda-preta">
        <option value="">Selecione o produto para detalhamento:</option>
        @foreach ($produtos as $key => $value)
            <option value="{{$value->id}}" {{($produtodetalhe->produto_id ?? old('produto_id')) == $value->id?'selected':'';}}>{{$value->nome}}</option>
        @endforeach
    </select>
        {{$errors->has('produto_id') ? $errors->first('produto_id'):'';}}
    <input type="text" step="0.01" placeholder="Comprimento" value="{{$produtodetalhe->comprimento ?? old('comprimento')}}" name="comprimento" class="borda-preta">
        {{$errors->has('comprimento') ? $errors->first('comprimento'):'';}}
    <input type="text" step="0.01" placeholder="Largura" value="{{$produtodetalhe->largura ?? old('largura')}}" name="largura" class="borda-preta">
        {{$errors->has('largura') ? $errors->first('largura'):'';}}
    <input type="text" step="0.01" placeholder="altura" value="{{$produtodetalhe->altura ?? old('altura')}}" name="altura" class="borda-preta">
        {{$errors->has('altura') ? $errors->first('altura'):'';}}
    <select name="unidade_id" class="borda-preta">
        <option value="">Selecione a unidade de medida:</option>
        @foreach ($unidades as $key => $value)
            <option value="{{$value->id}}" {{$produtodetalhe->unidade_id ?? old('unidade_id') == $value->id?'selected':'';}}>{{$value->unidade}}</option>
        @endforeach
    </select>
        {{$errors->has('unidade_id') ? $errors->first('unidade_id'):'';}}
    <button type="submit" class="borda-preta">
        @if (isset($produtodetalhe->id))
            Editar                            
        @else
            Adicionar
        @endif
    </button>
</form>