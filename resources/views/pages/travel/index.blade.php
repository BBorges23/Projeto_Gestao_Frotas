@extends('index')
@section('title','Viagens')
@section('subtitle', ' -> Listagem')
@section('content')

    {{ $travels_mot = session('travels') }}
    @section('plus_button')

        @component('components.plus_button',[
    'colorBTN'=> 'btn-warning',
    'itens'=>['item'=> ['Criar Viagem'], 'link' => ['admin.travels.create']]])

        @endcomponent

    @endsection

    <div class="row">

        @foreach($travels as $travel)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-warning',
                'icon_label' => 'fa-solid fa-road',
                'label'=> $travel->id.' - '.$travel->vehicle->licence_plate ,
                'titulo' => $travel->driver->user->name  ,

                'icon_titulo' => 'fa-solid fa-clipboard-user',
                'sub_titulo' => $travel->coords_origem.' -> '.$travel->coords_destino,
                'icon'=>'fa-solid fa-route',
                'link'=>route(auth()->user()->getTypeUser() . '.travels.show',$travel->id)
                ])
                @endcomponent
            </div>
        @endforeach
    </div>


    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        {{$travels->links()}}
    </div>
@endsection
