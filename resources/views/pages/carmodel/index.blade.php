@extends('index')
@section('title','Listagem de Modelos')

@section('content')
    <div>
        @foreach($carmodel as $model)
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Created AT</th>
                    <th>Updated AT</th>
                </tr>
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->brand->name}}</td>
                    <td>{{$model->created_at}}</td>
                    <td>{{$model->updated_at}}</td>

                </tr>
                <form class="form-custom" method="POST"
                      action="{{route('admin.carmodels.destroy',['carmodel'=>$model])}}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>
                    </button>
                </form>

            </table>
        @endforeach
    </div>
@endsection
