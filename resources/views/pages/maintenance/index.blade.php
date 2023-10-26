@extends('index')
@section('title','Manutenções')

{{ $maintenance_mot = session('maintenance') }}
@section('plus_button')
    @component('components.plus_button',[
    'colorBTN'=> 'btn-secondary',
    'itens'=>['Criar Manutenção']
])
    @endcomponent()

@endsection
@section('content')
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

        @role('driver')
        @if ($maintenance_mot)
            @foreach($maintenance_mot as $maintenance)
                <!-- Se a variável $travels_mot não for nula, faça o loop -->
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Vehicle ID</th>
                        <th>Driver Name</th>
                        <th>Created AT</th>
                        <th>Updated AT</th>
                    </tr>
                    <tr>
                        <td>{{$maintenance->id}}</td>
                        <td>{{$maintenance->vehicle_id}}</td>
                        <td>{{ session('driver')->name }}</td> <!-- Acessa o nome do motorista na sessão -->
                        <td>{{$maintenance->date_entry}}</td>
                        <td>{{$maintenance->motive}}</td>
                        <td>{{$maintenance->date_exit}}</td>
                    </tr>
                </table>
            @endforeach
        @else
            <!-- Caso a variável $travels_mot seja nula -->
            <p>Nenhuma viagem encontrada para este motorista.</p>
        @endif
        @endrole

    </div>
    <a class="btn btn-success" href="{{ route('admin.maintenances.create',$maintenance->id) }}">Criar</a><br />

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
{{--        {{$maintenances->links()}}--}}
    </div>
@endsection
