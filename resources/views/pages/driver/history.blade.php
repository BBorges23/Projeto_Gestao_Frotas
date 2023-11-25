@extends('index')
@section('title','Motoristas')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Histórico')
@section('content')

    <div class="row">
        @foreach($drivers as $driver)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-success ',
                'label'=> $driver->user->name,
                'titulo' => $driver->phone,
                'driver_state' => $driver->condition,
                'icon'=>'fa-solid fa-user',
                'link'=>route(auth()->user()->getTypeUser().'.drivers.delete',$driver->id)
                ])
                @endcomponent
            </div>
        @endforeach
    </div>


@endsection


