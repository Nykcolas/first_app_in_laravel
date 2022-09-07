<form action="{{isset($produto->id)?route('produto.update', $produto->id):route('produto.store');}}" method="post">
    @csrf
    @if (isset($produto->id))
        @method('put')
    @endif
    <input type="text" placeholder="Nome" value="{{$produto->nome ?? old('nome')}}" name="nome" class="borda-preta">
        {{$errors->has('nome') ? $errors->first('nome'):'';}}
    <input type="text" placeholder="Descrição" value="{{$produto->descricao ?? old('descricao')}}" name="descricao" class="borda-preta">
        {{$errors->has('descricao') ? $errors->first('descricao'):'';}}
    <input type="number" placeholder="Peso" value="{{$produto->peso ?? old('peso')}}" name="peso" class="borda-preta">
        {{$errors->has('peso') ? $errors->first('peso'):'';}}
    <select name="unidade_id" class="borda-preta">
        <option value="">Selecione a unidade de medida:</option>
        @foreach ($unidades as $key => $value)
            <option value="{{$value->id}}" {{$produto->unidade_id ?? old('unidade_id') == $value->id?'selected':'';}}>{{$value->unidade}}</option>
        @endforeach
    </select>
        {{$errors->has('unidade_id') ? $errors->first('unidade_id'):'';}}

    <select name="fornecedor_id" class="borda-preta">
        <option value="">Selecione o fornecedor:</option>
        @foreach ($fornecedor as $key => $value)
            <option value="{{$value->id}}" {{$produto->fornecedor_id ?? old('fornecedor_id') == $value->id?'selected':'';}}>{{$value->nome}}</option>
        @endforeach
    </select>
        {{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id'):'';}}
        
    <button type="submit" class="borda-preta">
        @if (isset($produto->id))
            Editar                            
        @else
            Adicionar
        @endif
    </button>
</form>