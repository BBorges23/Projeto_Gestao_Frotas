@extends('index')
@section('title','Drivers')

@section('content')


    <div class="row">
        @foreach($paginatedDrivers as $driver)
            <div class="col-sm-3">
                @component('components.small-box',[
                'bg' => 'bg-info',
                'valor'=> $driver->name,
                'titulo' => $driver->phone,
                'icon'=>'fa-solid fa-user',
                'link'=>route('admin.drivers.show',$driver->id)
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
                    <a class="page-link" href="{{ route('admin.drivers.index', ['page' => $i]) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </div>

    <a class="btn btn-warning" href="{{ route('admin.drivers.create',$driver->id) }}">Criar</a><br />
@endsection
