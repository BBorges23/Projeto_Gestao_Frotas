@extends('index',['between' => true])
@section('title', 'Veículos')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Listagem')
@section('content')
        @section('plus_button')

                <form action="{{ route('vehicles.pesquisa') }}" method="post" class="d-flex">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input status-checkbox" type="checkbox" id="checkbox1" name="status[]" value="DISPONIVEL" {{ in_array('DISPONIVEL', session('selectedStatuses', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="checkbox1">Disponivel</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input status-checkbox" type="checkbox" id="checkbox2" name="status[]" value="VENDIDO" {{ in_array('VENDIDO', session('selectedStatuses', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="checkbox2">Vendido</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input status-checkbox" type="checkbox" id="checkbox3" name="status[]" value="EM VIAGEM" {{ in_array('EM VIAGEM', session('selectedStatuses', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="checkbox3">Em viagem</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input status-checkbox" type="checkbox" id="checkbox4" name="status[]" value="EM MANUTENCAO" {{ in_array('EM MANUTENCAO', session('selectedStatuses', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="checkbox4">Em manutenção</label>
                    </div>
                    <!-- Campo oculto para deseleção -->
                    <input type="hidden" name="deselect_status" id="deselect_status" value="">
                </form>
            @role('admin')
            <div class="d-flex justify-content-end">
                <div class="dropdown pe-3">
                    <button class="btn btn-secondary border rounded-circle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-list"></i>
                    </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="{{ route('admin.brands.index') }}">Listagem Marcas</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.carmodels.index') }}">Listagem Modelos</a></li>
                        </ul>
                </div>
            @component('components.plus_button',[
            'colorBTN'=> 'btn-secondary',
             'itens' =>  ['item'=> ['Criar Veículos', 'Criar Modelos', 'Criar Marca'], 'link'=> ['admin.vehicles.create', 'admin.carmodels.create','admin.brands.create']]  ,
             ])
            @endcomponent
            </div>
            @endrole

        @endsection


    @section('search-bar')
        @component('components.search-bar',[
            'rota' => 'vehicles',
            'placeholder' => 'Matricula / Ano'
            ])
        @endcomponent
    @endsection

    @if(isset($resultados))
        <div class="row">
            @foreach ($resultados as $vehicle)
                <div class="col-xl-2  col-6 ">
                    @component('components.small-box',[
                    'bg' => 'bg-info',
                    'label'=> $vehicle->model->brand->name,
                    'titulo' => $vehicle->model->name.' - '.$vehicle->year,
                    'icon'=>'fa-solid fa-car-side',
                    'sub_titulo' => $vehicle->licence_plate,
                    'link'=>route(auth()->user()->getTypeUser().'.vehicles.show',$vehicle->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            @foreach ($vehicles as $vehicle)
                <div class="col-xl-2  col-6  " >
                    @component('components.small-box',[
                    'bg' => 'bg-info',
                    'label'=> $vehicle->model->brand->name,
                    'titulo' => $vehicle->model->name.' - '.$vehicle->year,
                    'icon'=>'fa-solid fa-car-side',
                    'sub_titulo' => $vehicle->licence_plate,
                    'link'=>route(auth()->user()->getTypeUser().'.vehicles.show',$vehicle->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif
    @empty($vehicle)
        <h4>Não há veiculos que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($vehicles instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $vehicles->links() }}
            @endif
        @endif
    </div>
@endsection



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Adiciona um ouvinte de evento para cada checkbox
        document.querySelectorAll('.status-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Se a checkbox foi desmarcada, define o valor do campo oculto
                if (!this.checked) {
                    document.getElementById('deselect_status').value = this.value;
                } else {
                    // Se foi marcada, limpa o campo oculto
                    document.getElementById('deselect_status').value = '';
                }
                // Submete o formulário
                this.form.submit();
            });
        });
    });
</script>
