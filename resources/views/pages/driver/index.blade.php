@extends('index')
@section('title','Motoristas')
@section('subtitle', ' -> Listagem')
@section('content')
    @role('admin')
    @section('plus_button')
        @component('components.plus_button',[
        'colorBTN' => 'bg-success',
        'itens' => ['item' => ['Criar Motorista'], 'link' => ['admin.drivers.create']]
        ])
        @endcomponent()
    @endsection
    @endrole

    <div class="row">
        @foreach($drivers as $driver)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-success ',
                'label'=> $driver->user->name,
                'titulo' => $driver->phone,
                'icon'=>'fa-solid fa-user',
                'link'=>route(auth()->user()->getTypeUser().'.drivers.show',$driver->id)
                ])
                @endcomponent
            </div>
        @endforeach
    </div>

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        {{$drivers->links()}}
    </div>

@endsection
