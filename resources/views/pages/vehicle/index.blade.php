@extends('index')
@section('title', 'Veículos')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Listagem')

@section('content')
    @role('admin')
        @section('plus_button')
            <div class="dropdown pe-3">
                <button class="btn btn-info border rounded-circle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-list"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item" href="{{ route('admin.brands.index') }}">Listagem Marcas</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.carmodels.index') }}">Listagem Modelos</a></li>
                </ul>
            </div>
            @component('components.plus_button',[
            'colorBTN'=> 'btn-info',
             'itens' =>  ['item'=> ['Criar Veículos', 'Criar Modelos', 'Criar Marca'], 'link'=> ['admin.vehicles.create', 'admin.carmodels.create','admin.brands.create']]  ,
             ])
            @endcomponent
        @endsection
    @endrole

    @section('search-bar')
        @component('components.search-bar',[
            'rota' => 'vehicles',
            'placeholder' => 'Matricula / Ano'
            ])
        @endcomponent
    @endsection

    @if(isset($resultados))
        <div class="row">
            @foreach ($resultados as $vehicle)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-info',
                    'label'=> $vehicle->model->brand->name,
                    'titulo' => $vehicle->model->name.' - '.$vehicle->year,
                    'icon'=>'fa-solid fa-car-side',
                    'sub_titulo' => $vehicle->licence_plate,
                    'link'=>route(auth()->user()->getTypeUser().'.vehicles.show',$vehicle->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            @foreach ($vehicles as $vehicle)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-info',
                    'label'=> $vehicle->model->brand->name,
                    'titulo' => $vehicle->model->name.' - '.$vehicle->year,
                    'icon'=>'fa-solid fa-car-side',
                    'sub_titulo' => $vehicle->licence_plate,
                    'link'=>route(auth()->user()->getTypeUser().'.vehicles.show',$vehicle->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif
    @empty($vehicle)
        <h4>Não há veiculos que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($vehicles instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $vehicles->links() }}
            @endif
        @endif
    </div>
@endsection
