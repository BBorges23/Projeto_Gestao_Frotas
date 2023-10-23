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

    <div class="row">
        @foreach($vehicles as $vehicle)

            <!-- SÓ PARA ADMIN -->
            @role('admin')
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-info',
                'label'=> $vehicle->model->brand->name,
                'titulo' => $vehicle->model->name,
                'icon'=>'fa-solid fa-car-side',
                'link'=>route('admin.vehicles.show',$vehicle->id)
                ])
                @endcomponent
            </div>
            @endrole

            <!-- SÓ PARA GESTOR -->
            @role('gestor')
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-info',
                'valor'=> $vehicle->model->brand->name,
                'titulo' => $vehicle->model->name,
                'icon'=>'fa-solid fa-car-side',
                'link'=>route('gestor.vehicles.show',$vehicle->id)
                ])
                @endcomponent
            </div>
            @endrole
        @endforeach
    </div>

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        {{$vehicles->links()}}
    </div>
    @role('admin')
    <a class="btn btn-success" href="{{ route('admin.vehicles.create',$vehicle->id) }}">Criar Veiculo</a><br/>
    <a class="btn btn-success" href="{{ route('admin.brands.index') }}">Listagem Marcas</a><br/>
    <a class="btn btn-success" href="{{ route('admin.carmodels.index') }}">Listagem Modelos</a><br/>
    @endrole
@endsection
