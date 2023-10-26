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
    </div>
    <a class="btn btn-success" href="{{ route('admin.maintenances.create',$maintenance->id) }}">Criar</a><br />

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
{{--        {{$maintenances->links()}}--}}
    </div>
@endsection
