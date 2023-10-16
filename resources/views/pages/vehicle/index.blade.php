@extends('index')
@section('title', 'Veículos')

@section('content')

    <div class="row">
        @foreach($paginatedVehicles as $vehicle)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-info',
                'valor'=> $vehicle->model->name,
                'titulo' => 'modelo',
                'icon'=>'fa-solid fa-car-side',
                'link'=>route('admin.vehicles.create')
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
@endsection
