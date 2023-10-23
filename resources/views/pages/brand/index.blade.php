@extends('index')
@section('title','Lista de Marcas')

@section('content')
    <div class="row">
        @foreach($brands as $brand)
            <div class="col-sm-3">
                @component('components.small-box',[
                    'bg' => 'bg-info',
                    'label'=> $brand->name,
                    'titulo' => $brand->name,
                    'icon'=>'fa-solid fa-car-side',
                    'link'=>route('admin.brands.show',$brand->id)
                    ])
                @endcomponent
            </div>
        @endforeach
    </div>
    <a class="btn btn-success" href="{{ route('admin.brands.create',$brand->id) }}">Criar Marca</a><br />
@endsection
