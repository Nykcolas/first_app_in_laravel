{{$slot}}
<form action='{{Route("site.contato")}}' method="post">
    @csrf
    <input name="nome" value="{{old("nome")}}" type="text" placeholder="Nome" class="{{$class}}">
    @if ($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    <br>
    <input name="telefone" value="{{old("telefone")}}" placeholder="Telefone" class="{{$class}}">
        @if ($errors->has('telefone'))
            {{$errors->first('telefone')}}
        @endif
    <br>
    <input name="email" value="{{old("email")}}" type="email" placeholder="E-mail" class="{{$class}}">
    @if ($errors->has('email'))
            {{$errors->first('email')}}
    @endif
    <br>
    <select name="motivo_contato_id" class="{{$class}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($arrOptions as $key => $value)
            <option {{@old('motivo_contato_id') == $value->id ?"Selected":"";}} value="{{$value->id}}">{{$value->motivo_contato}}</option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contato_id'))
        {{$errors->first('motivo_contato_id')}}
    @endif
    <br>
    <textarea name="mensagem" class="{{$class}}">{{old("mensagem") != ""? old("mensagem"):"aqui a sua mensagem";}}</textarea>
    @if ($errors->has('mensagem'))
        {{$errors->first('mensagem')}}
    @endif
    <br>
    <button type="submit" class="{{$class}}">ENVIAR</button>
</form>
@if ($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background:red; color:#fff;">
        @foreach ($errors->all() as $key => $value)
            {{$value}}
            <br>
        @endforeach
    </div>
@endif
