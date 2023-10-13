@extends('index')
@section('title','Veículos')

@section('content')

    <div class="row">
        @foreach($vehicles as $vehicle)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-info',
                'valor'=> $vehicle->model->name,
                'titulo' => 'modelo',
                'icon'=>'fa-solid fa-car-side',
                'link'=>route('admin.vehicles.create')
                ])
                @endcomponent
            </div>
        @endforeach
    </div>
@endsection
