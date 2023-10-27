@extends('index')
@section('title','Marcas')
@section('subtitle', ' -> Listagem')

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

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        {{$brands->links()}}
    </div>
@endsection
