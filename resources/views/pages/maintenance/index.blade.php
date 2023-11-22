@extends('index')
@section('title','Manutenções')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Listagem')

@section('content')
    @section('plus_button')



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
                <div class="col-xl-4 col-6">
                    @component('components.small-box',[
                    'bg' => 'btn-warning',
                    'driver_state'=> $maintenance->driver_state,
                    'icon_label' => 'fa-solid fa-gear',
                    'label'=> $maintenance->id. ' - '.$maintenance->vehicle->licence_plate,
                    'titulo' =>  $maintenance->motive,
                    'icon_titulo' => 'fa-solid fa-oil-can',
                    'calendario' => date('d-m-Y', strtotime($maintenance->date_entry)) . ' - ' . date('d-m-Y', strtotime($maintenance->date_exit)),
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
                <div class="col-xl-4 col-6">
                    @component('components.small-box',[
                    'bg' => 'btn-warning',
                    'driver_state'=> $maintenance->driver_state,
                    'icon_label' => 'fa-solid fa-gear',
                    'label'=> $maintenance->id. ' - '.$maintenance->vehicle->licence_plate,
                    'titulo' =>  $maintenance->motive,
                    'icon_titulo' => 'fa-solid fa-oil-can',
                    'calendario' => date('d-m-Y', strtotime($maintenance->date_entry)) . ' - ' . date('d-m-Y', strtotime($maintenance->date_exit)),
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
