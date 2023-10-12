@extends('index')
@section('title','Viagens')

@section('content')

<div>

    @foreach($travels as $travel)
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
                <td>{{$travel->vehicle->id}}</td>
                <td>{{$travel->driver->name}}</td>
                <td>{{$travel->created_at}}</td>
                <td>{{$travel->updated_at}}</td>

            </tr>
            <form class="form-custom" method="POST"
                  action="{{route('admin.travels.destroy',['travel'=>$travel])}}" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>
                </button>
            </form>

        </table>
    @endforeach
</div>
@endsection
