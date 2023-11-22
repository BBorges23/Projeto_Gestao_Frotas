@extends('index')
@section('title','Contas')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Listagem')

@section('content')
    @role('admin')
    @section('plus_button')
        @component('components.plus_button',[
        'colorBTN' => 'bg-success',
        'itens' => ['item' => ['Criar Conta'], 'link' => ['admin.accounts.create']]
        ])
        @endcomponent()
    @endsection
    @endrole

    @section('search-bar')
        @component('components.search-bar',[
       'rota' => 'accounts',
       'placeholder' => 'Nome / Email'
       ])
        @endcomponent
    @endsection

    @if(isset($resultados))
        <div class="row">
            @foreach($resultados as $user)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-success ',
                    'label'=> $user->name,
                    'titulo' => $user->email,
                    'icon'=>'fa-solid fa-user',

                    'link'=>route(auth()->user()->getTypeUser().'.accounts.show',$user->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            @foreach($users as $user)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'bg' => 'bg-success ',
                    'label'=> $user->name,
                    'titulo' => $user->email,
                    'icon'=>'fa-solid fa-user',

                    'link'=>route(auth()->user()->getTypeUser().'.accounts.show',$user->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif
    @empty($user)
        <h4>Não há utilizadores que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($users instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $users->links() }}
            @endif
        @endif
    </div>
@endsection
