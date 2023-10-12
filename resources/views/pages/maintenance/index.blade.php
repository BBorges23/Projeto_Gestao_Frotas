<div>
    <h1>Página dos Maintenances</h1>

    <h1>Listagem da tabela Maintenances</h1>
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
