@extends('index')
@section('title','Lista de Marcas')

@section('content')
    <div>

        @foreach($brands as $brand)
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created AT</th>
                    <th>Updated AT</th>
                </tr>
                <tr>
                    <td>{{$brand->id}}</td>
                    <td>{{$brand->name}}</td>
                    <td>{{$brand->created_at}}</td>
                    <td>{{$brand->updated_at}}</td>

                </tr>
                <form class="form-custom" method="POST"
                      action="{{route('admin.brands.destroy',['brand'=>$brand])}}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>
                    </button>
                </form>

            </table>
        @endforeach
    </div>
@endsection
