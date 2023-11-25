@extends('index')
@section('title','Viagens')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Histórico')
@section('content')

    <div class="row">
        @foreach($travels as $travel)
            <div class="col-sm-3">
                @component('components.small-box',[

                'icon_label' => 'fa-solid fa-road',
                'label'=> $travel->id.' - '.$travel->vehicle->licence_plate ,
                'titulo' => $travel->driver->user->name  ,
                'calendario'=>  date('d-m-Y', strtotime($travel->date_start))  ." -> ". date('d-m-Y', strtotime($travel->date_end)) ,
                'driver_state' => $travel->driver_state,
                'icon_titulo' => 'fa-solid fa-clipboard-user',
                'sub_titulo' => $travel->coords_origem.' -> '.$travel->coords_destino,
                'icon'=>'fa-solid fa-route',
                'link'=>route(auth()->user()->getTypeUser() . '.travels.show',$travel->id)
                ])
                @endcomponent
            </div>
        @endforeach
    </div>

@endsection


