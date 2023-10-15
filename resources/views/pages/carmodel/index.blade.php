<div>
    <h1>Página das Models</h1>

    <h1>Listagem da tabela Models</h1>
    @foreach($carmodel as $carmodel)
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Created AT</th>
                <th>Updated AT</th>
            </tr>
            <tr>
                <td>{{$carmodel->id}}</td>
                <td>{{$carmodel->name}}</td>
                <td>{{$carmodel->brand->name}}</td>
                <td>{{$carmodel->created_at}}</td>
                <td>{{$carmodel->updated_at}}</td>

            </tr>
            <form class="form-custom" method="POST"
                  action="{{route('admin.carmodels.destroy',['carmodel'=>$carmodel])}}" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>
                </button>
            </form>

        </table>
    @endforeach
</div>
