<div>
    <h1>Página das Models</h1>

    <h1>Listagem da tabela Models</h1>
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
                  action="{{route('admin.models.destroy',['model'=>$model])}}" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>
                </button>
            </form>

        </table>
    @endforeach
</div>
