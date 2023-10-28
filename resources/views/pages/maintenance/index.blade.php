@extends('index')
@section('title','Manutenções')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Listagem')

@section('content')
    @section('plus_button')
        @component('components.plus_button',[
        'colorBTN'=> 'btn-secondary',
        'itens'=>['item' => ['Criar Manutenção'], 'link' => ['admin.maintenances.create']]
        ])
        @endcomponent()
    @endsection

    @section('search-bar')
        @component('components.search-bar',[
            'rota' => 'maintenances',
            'placeholder' => 'Matricula / Motivo'
            ])
        @endcomponent
    @endsection

    @if(isset($resultados))
        <div class="row">
            @foreach($resultados as $maintenance)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-secondary bg-gradient',
                    'icon_label' => 'fa-solid fa-gear',
                    'label'=> $maintenance->id. ' - '.$maintenance->vehicle->licence_plate,
                    'titulo' =>  $maintenance->motive,
                    'icon_titulo' => 'fa-solid fa-oil-can',
                    'sub_titulo' => date('d-m-Y', strtotime($maintenance->date_entry)) . ' - ' . date('d-m-Y', strtotime($maintenance->date_exit)),
                    'icon'=>'fa-solid fa-screwdriver-wrench',
                    'link'=>route(auth()->user()->getTypeUser() . '.maintenances.show',$maintenance->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            @foreach($maintenances as $maintenance)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-secondary bg-gradient',
                    'icon_label' => 'fa-solid fa-gear',
                    'label'=> $maintenance->id. ' - '.$maintenance->vehicle->licence_plate,
                    'titulo' =>  $maintenance->motive,
                    'icon_titulo' => 'fa-solid fa-oil-can',
                    'sub_titulo' => date('d-m-Y', strtotime($maintenance->date_entry)) . ' - ' . date('d-m-Y', strtotime($maintenance->date_exit)),
                    'icon'=>'fa-solid fa-screwdriver-wrench',
                    'link'=>route(auth()->user()->getTypeUser() . '.maintenances.show',$maintenance->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif
    @empty($maintenance)
        <h4>Não há manutenções que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($maintenances instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $maintenances->links() }}
            @endif
        @endif
    </div>
@endsection
