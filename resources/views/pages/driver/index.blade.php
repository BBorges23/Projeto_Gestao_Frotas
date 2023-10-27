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

    @section('search-bar')
            @component('components.search-bar',[
           'rota' => 'drivers',
           'placeholder' => 'Nome / Nif'
           ])
            @endcomponent
    @endsection

    @if(isset($resultados))
        <div class="row">
            @foreach($resultados as $driver)
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
    @else
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
    @endif
    @empty($driver)
        <h4>Não há motoristas que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($drivers instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $drivers->links() }}
            @endif
        @endif
    </div>

@endsection
