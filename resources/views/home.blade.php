@extends('index')
@section('title','Home')

@section('content')
    <h1>Dados</h1>
    <div class="row">
        @if ($driver)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-success ',
                'label'=> $driver->user->name,
                'titulo' => $driver->phone,
                'icon'=>'fa-solid fa-user',
                'link'=>route('home')
                ])
                @endcomponent
            </div>
        @else
            <p>Nenhum driver encontrado.</p>
        @endif
    </div>

    <h2>Viagens</h2>
    <div class="row">
        @if($travels)
            @foreach($travels as $travel)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-warning',
                    'icon_label' => 'fa-solid fa-road',
                    'label'=> $travel->vehicle->licence_plate,
                    'titulo' => $travel->driver->user->name,
                    'icon_titulo' => 'fa-solid fa-clipboard-user',
                    'sub_titulo' => $travel->coords_origem.' -> '.$travel->coords_destino,
                    'icon'=>'fa-solid fa-route',
                    'link'=>route('home')
                    ])
                    @endcomponent
                </div>
            @endforeach
        @else
            <p>Nenhuma viagem encontrada.</p>
        @endif
    </div>

    <h2>Manutenções</h2>
    <div class="row">
        @if($maintenances)
            @foreach($maintenances as $maintenance)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-secondary bg-gradient',
                    'icon_label' => 'fa-solid fa-gear',
                    'label'=> $maintenance->vehicle->licence_plate,
                    'titulo' =>  $maintenance->motive,
                    'icon_titulo' => 'fa-solid fa-oil-can',
                    'sub_titulo' => date('d-m-Y', strtotime($maintenance->date_entry)) . ' - ' . date('d-m-Y', strtotime($maintenance->date_exit)),
                    'icon'=>'fa-solid fa-screwdriver-wrench',
                    'link'=>route('home')
                    ])
                    @endcomponent
                </div>
            @endforeach
        @else
            <p>Nenhuma manutenção encontrada.</p>
        @endif
    </div>
@endsection
