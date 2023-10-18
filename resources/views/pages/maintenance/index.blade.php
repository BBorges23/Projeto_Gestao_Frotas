@extends('index')
@section('title','Manutenções')

{{ $maintenance_mot = session('maintenance') }}

@section('content')
    <div>

        @role('admin')
        @foreach($maintenances as $maintenance)
            <table>
                <tr>
                    <th>ID</th>
                    <th>State</th>
                    <th>Vehicle Id</th>
                    <th>Motive</th>
                    <th>Date Entry</th>
                    <th>Date Exit</th>
                    <th>Created AT</th>
                    <th>Updated AT</th>
                </tr>
                <tr>
                    <td>{{$maintenance->id}}</td>
                    <td>{{$maintenance->state}}</td>
                    <td>{{$maintenance->vehicle_id}}</td>
                    <td>{{$maintenance->motive}}</td>
                    <td>{{$maintenance->date_entry}}</td>
                    <td>{{$maintenance->date_exit}}</td>
                    <td>{{$maintenance->created_at}}</td>
                    <td>{{$maintenance->updated_at}}</td>
                </tr>
            </table>
        @endforeach
        @endrole


        @role('gestor')
        @foreach($maintenances as $maintenance)
            <table>
                <tr>
                    <th>ID</th>
                    <th>State</th>
                    <th>Vehicle Id</th>
                    <th>Motive</th>
                    <th>Date Entry</th>
                    <th>Date Exit</th>
                    <th>Created AT</th>
                    <th>Updated AT</th>
                </tr>
                <tr>
                    <td>{{$maintenance->id}}</td>
                    <td>{{$maintenance->state}}</td>
                    <td>{{$maintenance->vehicle_id}}</td>
                    <td>{{$maintenance->motive}}</td>
                    <td>{{$maintenance->date_entry}}</td>
                    <td>{{$maintenance->date_exit}}</td>
                    <td>{{$maintenance->created_at}}</td>
                    <td>{{$maintenance->updated_at}}</td>
                </tr>
            </table>
        @endforeach
        @endrole

        @role('driver')
        @if ($maintenance_mot)
            @foreach($maintenance_mot as $maintenance)
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
                        <td>{{$maintenance->id}}</td>
                        <td>{{$maintenance->vehicle_id}}</td>
                        <td>{{ session('driver')->name }}</td> <!-- Acessa o nome do motorista na sessão -->
                        <td>{{$maintenance->date_entry}}</td>
                        <td>{{$maintenance->motive}}</td>
                        <td>{{$maintenance->date_exit}}</td>
                    </tr>
                </table>
            @endforeach
        @else
            <!-- Caso a variável $travels_mot seja nula -->
            <p>Nenhuma viagem encontrada para este motorista.</p>
        @endif
        @endrole

    </div>
@endsection
