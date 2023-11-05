@extends('index', ['between' => true])
@section('title','Manutenções')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Listagem')

@section('content')
    @section('plus_button')

        <form action="{{ route('maintenances.pesquisa') }}" method="post" class="d-flex">
            @csrf
            <div class="form-check">
                <input class="form-check-input status-checkbox" type="checkbox" id="checkbox1" name="status_m[]" value="POR ACEITAR" {{ in_array('POR ACEITAR', session('selectedStatuses_m', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox1">Por aceitar</label>
            </div>
            <div class="form-check">
                <input class="form-check-input status-checkbox" type="checkbox" id="checkbox2" name="status_m[]" value="ACEITE" {{ in_array('ACEITE', session('selectedStatuses_m', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox2">Aceite</label>
            </div>
            <div class="form-check">
                <input class="form-check-input status-checkbox" type="checkbox" id="checkbox3" name="status_m[]" value="PROBLEMAS" {{ in_array('PROBLEMAS', session('selectedStatuses_m', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox3">Problemas</label>
            </div>
            <div class="form-check">
                <input class="form-check-input status-checkbox" type="checkbox" id="checkbox4" name="status_m[]" value="CONCLUIDO" {{ in_array('CONCLUIDO', session('selectedStatuses_m', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox4">Concluído</label>
            </div>
            <!-- Campo oculto para deseleção -->
            <input type="hidden" name="deselect_status_m" id="deselect_status_m" value="">
        </form>

        @component('components.plus_button',[
        'colorBTN'=> 'btn-secondary',
        'itens'=>['item' => ['Criar Manutenção'], 'link' => [auth()->user()->getTypeUser().'.maintenances.create']]
        ])
        @endcomponent()
    @endsection

    @section('search-bar')
        @component('components.search-bar',[
            'rota' => 'maintenances',
            'placeholder' => 'Matricula / Motivo'
            ])
        @endcomponent
    @endsection

    @if(isset($resultados))
        <div class="row">
            @foreach($resultados as $maintenance)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'driver_state'=> $maintenance->driver_state,
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
    @else
        <div class="row">
            @foreach($maintenances as $maintenance)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'driver_state'=> $maintenance->driver_state,
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
    @endif
    @empty($maintenance)
        <h4>Não há manutenções que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($maintenances instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $maintenances->links() }}
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
                    document.getElementById('deselect_status_m').value = this.value;
                } else {
                    // Se foi marcada, limpa o campo oculto
                    document.getElementById('deselect_status_m').value = '';
                }
                // Submete o formulário
                this.form.submit();
            });
        });
    });
</script>
