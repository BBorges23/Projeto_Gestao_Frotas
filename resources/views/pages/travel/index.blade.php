@extends('index',['between' => true])
@section('title','Viagens')
@if(request()->routeIs('*.pesquisa'))
    @section('subtitle', ' -> Pesquisa')

@endif
@section('subtitle', ' -> Listagem')

@section('content')

    @section('plus_button')
        <form action="{{ route('travels.pesquisa') }}" method="post" class="d-flex">
            @csrf
            <div class="form-check">
                <input class="form-check-input status-checkbox" type="checkbox" id="checkbox1" name="status[]" value="POR ACEITAR" {{ in_array('POR ACEITAR', session('selectedStatuses', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox1">Por aceitar</label>
            </div>
            <div class="form-check">
                <input class="form-check-input status-checkbox" type="checkbox" id="checkbox2" name="status[]" value="ACEITE" {{ in_array('ACEITE', session('selectedStatuses', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox2">Aceite</label>
            </div>
            <div class="form-check">
                <input class="form-check-input status-checkbox" type="checkbox" id="checkbox3" name="status[]" value="PROBLEMAS" {{ in_array('PROBLEMAS', session('selectedStatuses', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox3">Problemas</label>
            </div>
            <div class="form-check">
                <input class="form-check-input status-checkbox" type="checkbox" id="checkbox4" name="status[]" value="CONCLUIDO" {{ in_array('CONCLUIDO', session('selectedStatuses', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox4">Concluído</label>
            </div>
            <!-- Campo oculto para deseleção -->
            <input type="hidden" name="deselect_status" id="deselect_status" value="">
        </form>
        <div class="d-flex p-1"><p><a href="{{route(auth()->user()->getTypeUser().'.travels.history')}}" class="link-underline-primary">Histórico</a></p></div>

        @component('components.plus_button',[
        'colorBTN'=> 'btn-secondary',
        'itens'=>['item'=> ['Criar Viagem'], 'link' => [auth()->user()->getTypeUser().'.travels.create']]])
        @endcomponent
    @endsection

    @section('search-bar')
        @component('components.search-bar',[
            'rota' => 'travels',
            'placeholder' => 'Nome / Matricula / Local'
            ])
        @endcomponent
    @endsection

    @if(isset($resultados))
        <div class="row">
            @foreach($resultados as $travel)
                <div class="col-sm-3">
                    @component('components.small-box',[

                    'icon_label' => 'fa-solid fa-road',
                    'label'=> $travel->id.' - '.$travel->vehicle->licence_plate ,
                    'titulo' => $travel->driver->user->name  ,
                    'calendario'=>  date('d-m-Y', strtotime($travel->date_start))  ." -> ". date('d-m-Y', strtotime($travel->date_end)) ,
                    'driver_state' => $travel->driver_state,
                    'icon_titulo' => 'fa-solid fa-clipboard-user',
                    'sub_titulo' => $travel->coords_origem.' -> '.$travel->coords_destino,
                    'icon'=>'fa-solid fa-route',
                    'link'=>route(auth()->user()->getTypeUser() . '.travels.show',$travel->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            @foreach($travels as $travel)
                <div class="col-sm-3">
                    @component('components.small-box',[
                    'icon_label' => 'fa-solid fa-road',
                    'label'=> $travel->id.' - '.$travel->vehicle->licence_plate ,
                    'titulo' => $travel->driver->user->name  ,
                    'calendario'=>  date('d-m-Y', strtotime($travel->date_start))  ." -> ". date('d-m-Y', strtotime($travel->date_end)) ,
                    'driver_state' => $travel->driver_state,
                    'icon_titulo' => 'fa-solid fa-clipboard-user',
                    'sub_titulo' => $travel->coords_origem.' -> '.$travel->coords_destino,
                    'icon'=>'fa-solid fa-route',
                    'link'=>route(auth()->user()->getTypeUser() . '.travels.show',$travel->id)
                    ])
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif
    @empty($travel)
        <h4>Não há viagens que correspondam à pesquisa</h4>
    @endempty

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        @if(isset($resultados))
            @if ($resultados instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $resultados->links() }}
            @endif
        @else
            @if ($travels instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $travels->links() }}
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
