@extends('index')
@section('title', 'Veículos')

@section('content')

    @section('plus_button')
        @component('components.plus_button',[
        'colorBTN'=> 'btn-info',
         'itens' =>  ['item'=> ['criar veiculos', 'criar modelos'], 'link'=> ['admin.vehicles.create', 'admin.carmodels.create']]  ,
         ])

        @endcomponent

    @endsection

    <form action="{{ route('vehicles.pesquisa') }}" method="post">
        @csrf
        <input type="text" name="campo_de_pesquisa" placeholder="Pesquisar...">
        <button type="submit">Pesquisar</button>
    </form>

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
    @if(isset($vehicles))
        @role('admin')
        <div class="row">
            <a class="btn btn-success" href="{{ route('admin.brands.index') }}">Listagem Marcas</a><br/>
            <a class="btn btn-success" href="{{ route('admin.carmodels.index') }}">Listagem Modelos</a><br/>
        </div>
        @endrole
    @endif
@endsection
