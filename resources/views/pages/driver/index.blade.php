@extends('index')
@section('title','Motoristas')

@section('content')


    <div class="row">
        @foreach($drivers as $driver)
            @role('admin')
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-success ',
                'label'=> $driver->name,
                'titulo' => $driver->phone,
                'icon'=>'fa-solid fa-user',
                'link'=>route('admin.drivers.show',$driver->id)
                ])
                @endcomponent
            </div>
            @endrole

            @role('gestor')
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-success ',
                'valor'=> $driver->name,
                'titulo' => $driver->phone,
                'icon'=>'fa-solid fa-user',
                'link'=>route('gestor.drivers.show',$driver->id)
                ])
                @endcomponent
            </div>
            @endrole
        @endforeach
    </div>


    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        {{$drivers->links()}}
    </div>

    <a class="btn btn-success" href="{{ route('admin.drivers.create',$driver->id) }}">Criar</a><br />
@endsection
