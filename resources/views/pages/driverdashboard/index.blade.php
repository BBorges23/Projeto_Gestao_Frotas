@extends('index')
@section('title','Home')

@section('content')

    <h2>Viagens</h2>
    <div class="row">
        @if(empty($travels->isEmpty()))
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
                   'calendario'=>  date('d-m-Y', strtotime($travel->date_start))  ." -> ". date('d-m-Y', strtotime($travel->date_end)) ,
                    'link'=>route('driver.travels.show', $travel->id)
                    ])
                    @endcomponent
                </div>
                @endif
            @endforeach
        @else
            <h4>Nenhuma viagem foi encontrada.</h4>
        @endif

    </div>



@endsection
