@extends('index')
@section('title','Modelos')
@section('subtitle', ' -> Listagem')

@section('content')
    <div class="row">
        @foreach($carmodel as $model)
            <div class="col-sm-3">
                @component('components.small-box',[
                    'bg' => 'bg-info',
                    'label'=> $model->name,
                    'titulo' => $model->brand->name,
                    'icon'=>'fa-solid fa-car-side',
                    'link'=>route('admin.carmodels.show',$model->id)
                    ])
                @endcomponent
            </div>
        @endforeach
    </div>
    <a class="btn btn-success" href="{{ route('admin.carmodels.create',$model->id) }}">Criar Modelo</a><br />

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        {{$carmodel->links()}}
    </div>
@endsection
