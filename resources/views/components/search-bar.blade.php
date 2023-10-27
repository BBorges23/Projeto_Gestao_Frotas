@if(request()->routeIs("*.pesquisa"))
    <form action="{{route($rota.'.pesquisa') }}" method="post">
        @csrf
        <input type="text" name="campo_de_pesquisa" placeholder="{{$placeholder}}">
        <button type="submit">Pesquisar</button>
    </form>
@endif
