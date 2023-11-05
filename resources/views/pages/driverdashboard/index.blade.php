@extends('index')
@section('title','Home')

@section('content')
{{--    <h1>Dados</h1>--}}
{{--    <div class="row">--}}
{{--        @if ($driver)--}}
{{--            <div class="col-sm-3">--}}
{{--                @component('components.small-box',[--}}
{{--                'bg' => 'bg-success ',--}}
{{--                'label'=> $driver->user->name,--}}
{{--                'titulo' => $driver->phone,--}}
{{--                'icon'=>'fa-solid fa-user',--}}
{{--                'link'=>route('home')--}}
{{--                ])--}}
{{--                @endcomponent--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <p>Nenhum driver encontrado.</p>--}}
{{--        @endif--}}
{{--    </div>--}}

    <h2>Viagens</h2>
    <div class="row">
        @if($travels)
            @foreach($travels as $travel)
                @if($travel->state === "PROCESSANDO")
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-warning',
                    'icon_label' => 'fa-solid fa-road',
                    'label'=> $travel->id.' - '.$travel->vehicle->licence_plate ,
                    'titulo' => $travel->driver->user->name,
                    'driver_state' => $travel->driver_state,
                    'icon_titulo' => 'fa-solid fa-clipboard-user',
                    'sub_titulo' => $travel->coords_origem.' -> '.$travel->coords_destino,
                    'icon'=>'fa-solid fa-route',
                    'link'=>route('driver.travels.show', $travel->id)
                    ])
                    @endcomponent
                </div>
                @endif
            @endforeach
            @if($travel->state != "PROCESSANDO")
               <h4>Nenhuma viagem foi encontrada.</h4>
            @endif
        @endif
    </div>


    <h2 class="pt-4">Manutenções</h2>
    <div class="row">

        @if($maintenances)
            @foreach($maintenances as $maintenance)
                @if($maintenance->state === "PROCESSANDO")
                    <div class="col-sm-3">
                        @component('components.small-box',[
                        'bg' => 'bg-secondary bg-gradient',
                        'icon_label' => 'fa-solid fa-gear',
                        'label'=> $maintenance->id. ' - '.$maintenance->vehicle->licence_plate,
                        'titulo' =>  $maintenance->motive,
                        'driver_state' => $maintenance->driver_state,
                        'icon_titulo' => 'fa-solid fa-oil-can',
                        'sub_titulo' => date('d-m-Y', strtotime($maintenance->date_entry)) . ' - ' . date('d-m-Y', strtotime($maintenance->date_exit)),
                        'icon'=>'fa-solid fa-screwdriver-wrench',
                        'link'=>route('driver.maintenances.show', $maintenance->id)
                        ])
                        @endcomponent
                    </div>
                @endif
            @endforeach
            @if($maintenance->state != "PROCESSANDO")
                    <h4>Nenhuma viagem foi encontrada.</h4>
            @endif
        @endif

    </div>
@endsection
