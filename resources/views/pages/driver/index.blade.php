<div>
    <h1>Página dos Drivers</h1>

    <h1>Listagem da tabela Drivers</h1>
    @foreach($drivers as $driver)
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NIF</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created AT</th>
                <th>Updated AT</th>
            </tr>
            <tr>
                <td>{{$driver->id}}</td>
                <td>{{$driver->name}}</td>
                <td>{{$driver->nif}}</td>
                <td>{{$driver->email}}</td>
                <td>{{$driver->phone}}</td>
                <td>{{$driver->created_at}}</td>
                <td>{{$driver->updated_at}}</td>

            </tr>
            <form class="form-custom" method="POST"
                  action="{{route('admin.drivers.index',['driver'=>$driver])}}" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Aquii</i>
                </button>
            </form>

        </table>
    @endforeach
</div>
