@extends('index',['between' => true])
@section('title','Motoristas')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Listagem')
@section('content')

    @role('admin')
        @section('plus_button')

            <form action="{{ route('drivers.pesquisa') }}" method="post" class="d-flex">
                @csrf
                <div class="form-check">
                    <input class="form-check-input status-checkbox" type="checkbox" id="checkbox1" name="status[]" value="BAIXA" {{ in_array('BAIXA', session('selectedStatuses', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="checkbox1">Baixa</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input status-checkbox" type="checkbox" id="checkbox2" name="status[]" value="FERIAS" {{ in_array('FERIAS', session('selectedStatuses', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="checkbox2">Férias</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input status-checkbox" type="checkbox" id="checkbox3" name="status[]" value="EM TRABALHO" {{ in_array('EM TRABALHO', session('selectedStatuses', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="checkbox3">Em trabalho</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input status-checkbox" type="checkbox" id="checkbox4" name="status[]" value="DISPONIVEL" {{ in_array('DISPONIVEL', session('selectedStatuses', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="checkbox4">Disponível</label>
                </div>
                <!-- Campo oculto para deseleção -->
                <input type="hidden" name="deselect_status" id="deselect_status" value="">
            </form>


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
                    'driver_state' => $driver->condition,
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
                    'driver_state' => $driver->condition,
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
