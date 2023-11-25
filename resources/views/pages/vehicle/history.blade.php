@extends('index')
@section('title','Veículos')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Histórico')
@section('content')

    <div class="row">
        @foreach ($vehicles as $vehicle)
            <div class="col-xl-2 col-6">
                @component('components.small-box', [
                    'bg' => 'bg-info',
                    'label' => $vehicle->model->brand->name,
                    'titulo' => $vehicle->model->name . ' - ' . $vehicle->year,
                    'icon' => 'fa-solid fa-car-side',
                    'sub_titulo' => $vehicle->licence_plate,
                    // O link pode ser ajustado conforme sua necessidade
                    'link' => route(auth()->user()->getTypeUser().'.vehicles.delete', $vehicle),
                ])
                @endcomponent
            </div>
        @endforeach
    </div>


@endsection


