@extends('index')
@section('title','Manutenções')

@section('content')
    <div>

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
                    <td>@if(!$maintenance->state)
                            Concluída
                        @else
                            Em Aberto
                    @endif
                    <td>{{$maintenance->vehicle->id}}</td>
                    <td>{{$maintenance->motive}}</td>
                    <td>{{$maintenance->date_entry}}</td>
                    <td>{{$maintenance->date_exit}}</td>
                    <td>{{$maintenance->created_at}}</td>
                    <td>{{$maintenance->updated_at}}</td>

                </tr>
                <form class="form-custom" method="POST"
                      action="{{route('admin.maintenances.destroy',['maintenance'=>$maintenance])}}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>
                    </button>
                </form>

            </table>
        @endforeach
    </div>
@endsection
