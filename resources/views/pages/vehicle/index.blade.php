@extends('index')
@section('title','Veículos')

@section('content')

<div>

    @foreach($vehicles as $vehicle)
        <table>
            <tr>
                <th>ID</th>
                <th>Modelo ID</th>
                <th>Licence Plate</th>
                <th>Year</th>
                <th>Date Buy</th>
                <th>Created AT</th>
                <th>Updated AT</th>
            </tr>
            <tr>
                <td>{{$vehicle->id}}</td>
                <td>{{$vehicle->model_id}}</td>
                <td>{{$vehicle->licence_plate}}</td>
                <td>{{$vehicle->year}}</td>
                <td>{{$vehicle->date_buy}}</td>
                <td>{{$vehicle->created_at}}</td>
                <td>{{$vehicle->updated_at}}</td>

            </tr>
            <form class="form-custom" method="POST"
                  action="{{route('admin.vehicles.destroy',['vehicle'=>$vehicle])}}" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>
                </button>
            </form>

        </table>



    @endforeach
</div>

<a href="{{route('admin.vehicles.create')}}">Criar</a>

@endsection
