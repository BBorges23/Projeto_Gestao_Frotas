@extends('index')
@section('title','Modelos')
@section('subtitle', ' -> Listagem')

@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif

@section('content')

    @section('search-bar')
        @component('components.search-bar',[
            'rota' => 'carmodels',
            'placeholder' => 'Nome'
            ])
        @endcomponent
    @endsection

    @if(isset($resultados))
        <div class="row">
            @foreach($resultados as $model)
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
    @else
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
    @endif
    @empty($model)
        <h4>Não há modelos que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($carmodel instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $carmodel->links() }}
            @endif
        @endif
    </div>
@endsection
