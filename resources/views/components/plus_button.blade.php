
<div class="dropdown ">

    <button class="btn {{$colorBTN}} border rounded-circle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-plus"></i>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @foreach($itens['item'] as $key => $item )
            <li><a class="dropdown-item" href="{{route($itens['link'][$key])}}">{{$item}} </a></li>
        @endforeach
    </ul>
</div>


