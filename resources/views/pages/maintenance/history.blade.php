@extends('index')
@section('title','Manutenções')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Histórico')
@section('content')

    <div class="row">
        @foreach($maintenances as $maintenance)
            <div class="col-xl-4 col-6">
                @component('components.small-box',[
                'bg' => 'btn-warning',
                'driver_state'=> $maintenance->driver_state,
                'icon_label' => 'fa-solid fa-gear',
                'label'=> $maintenance->id. ' - '.$maintenance->vehicle->licence_plate,
                'titulo' =>  $maintenance->motive,
                'icon_titulo' => 'fa-solid fa-oil-can',
                'calendario' => date('d-m-Y', strtotime($maintenance->date_entry)) . ' - ' . date('d-m-Y', strtotime($maintenance->date_exit)),
                'icon'=>'fa-solid fa-screwdriver-wrench',
                'link'=>route(auth()->user()->getTypeUser() . '.maintenances.show',$maintenance->id)
                ])
                @endcomponent
            </div>
        @endforeach
    </div>

@endsection


