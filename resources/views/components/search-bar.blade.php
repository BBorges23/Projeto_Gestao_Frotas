<form action="{{route($rota.'.pesquisa') }}" method="post" >
    @csrf
    <div class="d-flex justify-content-end align-content-center">
        <input type="text" name="campo_de_pesquisa" value="{{ old('campo_de_pesquisa')}}" placeholder="{{$placeholder}}"
               class="rounded-pill border border-4 " >
        <button type="submit" class="border-0 bg-transparent pe-4"><i class="fa-solid fa-magnifying-glass fa-xl"></i></button>
    </div>

</form>

