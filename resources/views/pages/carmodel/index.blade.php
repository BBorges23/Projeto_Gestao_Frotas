@extends('index')
@section('title','Listagem de Modelos')

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
@endsection
