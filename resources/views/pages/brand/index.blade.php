@extends('index')
@section('title','Marcas')
@section('subtitle', ' -> Listagem')

@section('search-bar')
    @component('components.search-bar',[
        'rota' => 'brands',
        'placeholder' => 'Nome'
        ])
    @endcomponent
@endsection

@section('content')
    @if(isset($resultados))
        <div class="row">
            @foreach($resultados as $brand)
                <div class="col-sm-3">
                    @component('components.small-box',[
                        'bg' => 'bg-info',
                        'label'=> $brand->name,
                        'titulo' => $brand->name,
                        'icon'=>'fa-solid fa-car-side',
                        'link'=>route('admin.brands.show',$brand->id)
                        ])
                    @endcomponent
                </div>
            @endforeach
        </div>

    @else
        <div class="row">
            @foreach($brands as $brand)
                <div class="col-sm-3">
                    @component('components.small-box',[
                        'bg' => 'bg-info',
                        'label'=> $brand->name,
                        'titulo' => $brand->name,
                        'icon'=>'fa-solid fa-car-side',
                        'link'=>route('admin.brands.show',$brand->id)
                        ])
                    @endcomponent
                </div>
            @endforeach
        </div>
        <a class="btn btn-success" href="{{ route('admin.brands.create',$brand->id) }}">Criar Marca</a><br />
    @endif
    @empty($brand)
        <h4>Não há marcas que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($brands instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $brands->links() }}
            @endif
        @endif
    </div>
@endsection
