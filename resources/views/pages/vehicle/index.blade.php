@extends('index')
@section('title', 'Veículos')

@section('content')

    <div class="row">
        @foreach($paginatedVehicles as $vehicle)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-info',
                'valor'=> $vehicle->model->brand->name,
                'titulo' => $vehicle->model->name,
                'icon'=>'fa-solid fa-car-side',
                'link'=>route('admin.vehicles.show',$vehicle->id)
                ])
                @endcomponent
            </div>
        @endforeach
    </div>

    <!-- Adicione os links de paginação manualmente -->
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            @for ($i = 1; $i <= $totalPages; $i++)
                <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}">
                    <a class="page-link" href="{{ route('admin.vehicles.index', ['page' => $i]) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </div>
    @role('admin')
    <a class="btn btn-warning" href="{{ route('admin.vehicles.create',$vehicle->id) }}">Criar</a><br />
    @endrole
@endsection
