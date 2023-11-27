<div class="dropdown">
    <!-- Botão que aciona o dropdown -->
    <button class="btn {{$colorBTN}} border rounded-circle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-plus"></i> <!-- Ícone de adição -->
    </button>

    <!-- Lista de opções do dropdown -->
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
        <!-- Loop através dos itens para criar opções no dropdown -->
        @foreach($itens['item'] as $key => $item )
            <li><a class="dropdown-item" href="{{route($itens['link'][$key])}}">{{$item}} </a></li>
        @endforeach
    </ul>
</div>
