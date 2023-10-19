@extends('index')
@section('title','Viagens')

@section('content')

    {{ $travels_mot = session('travels') }}
    <div class="row">

        @foreach($travels as $travel)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-warning',
                'icon_label' => 'fa-solid fa-road',
                'label'=> $travel->id.' - '.$travel->vehicle->licence_plate,
                'titulo' =>   $travel->driver->name,
                'icon_titulo' => 'fa-solid fa-clipboard-user',
                'sub_titulo' => $travel->coords_origem.' -> '.$travel->coords_destino,
                'icon'=>'fa-solid fa-route',
                'link'=>route('admin.travels.show',$travel->id)
                ])
                @endcomponent
            </div>
        @endforeach

{{--        <form class="form-custom" method="POST"--}}
{{--              action="{{route('admin.travels.destroy',['travel'=>$travel])}}" style="display: inline">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>--}}
{{--            </button>--}}
{{--        </form>--}}

        @role('driver')
        @if ($travels_mot)
            @foreach($travels_mot as $travel)
                <!-- Se a variável $travels_mot não for nula, faça o loop -->
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Vehicle ID</th>
                        <th>Driver Name</th>
                        <th>Created AT</th>
                        <th>Updated AT</th>
                    </tr>
                    <tr>
                        <td>{{$travel->id}}</td>
                        <td>{{$travel->vehicle_id}}</td>
                        <td>{{ session('driver')->name }}</td> <!-- Acessa o nome do motorista na sessão -->
                        <td>{{$travel->created_at}}</td>
                        <td>{{$travel->updated_at}}</td>
                    </tr>
                </table>
            @endforeach
        @else
            <!-- Caso a variável $travels_mot seja nula -->
            <p>Nenhuma viagem encontrada para este motorista.</p>
        @endif
        @endrole
    </div>
    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        {{$travels->links()}}
    </div>
@endsection
