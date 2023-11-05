<meta name="csrf-token" content="{{ csrf_token() }}">
<section>
    <div class="container py-4">
        <div class="row d-flex justify-content-center">
            <div class="col col-lg-9 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 text-center text-white {{$cor}}"
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="{{asset($imagem)}}"
                                 alt="Avatar" class="img-fluid my-5" style="width: 200px;"/>
                            @if(isset($nome))
                                <h4>{{$nome}}</h4>
                            @endif
                            @if(isset($descricao))
                                <h5 class="pb-2">{{$descricao}}</h5>
                            @endif
                            @if(isset($estado))
                                <h4 class="pt-4">{{$estado}}: {{$driver_state}}</h4>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6 class="d-flex justify-content-between">Informações
                                    @role('driver')
                                    @if(isset($driver_state))
                                        @if($driver_state == 'ACEITE')
                                            <a style="color: #e10505;" href="{{ route($route4)}}" onclick="confirmation_problems(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}" title="Problemas"><i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #e10505;"></i></a>
                                        @endif
                                    @endif
                                    @endrole</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>{{$titulo1}}</h6>
                                        <p class="text-muted">{{$informacao1}}</p>
                                    </div>
                                    @if(isset($titulo2))
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo2}}</h6>
                                            <p class="text-muted">{{$informacao2}}</p>
                                        </div>
                                    @endif
                                </div>

                                @if(isset($titulo3))
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo3}}</h6>
                                            <p class="text-muted">{{$informacao3}}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            @if(isset($titulo4))
                                                <h6>{{$titulo4}}</h6>
                                                <p class="text-muted">{{$informacao4}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    @if(request()->routeIs("*.travels.show"))
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">

                                            <h3>Observações</h3>
                                            <p>{{$status_driver}}</p>
                                        </div>
                                    @endif
                                    @if(request()->routeIs("*.maintenances.show"))
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">

                                            <h3>Observações</h3>
                                            <p>{{$status_driver}}</p>
                                        </div>
                                    @endif

                                @endif
                                @if(isset($titulo5))
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo5}}</h6>
                                            <p class="text-muted">{{$informacao5}}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo6}}</h6>
                                            <p class="text-muted">{{$informacao6}}</p>
                                        </div>
                                    </div>

                                @endif
                                @if(isset($titulo7))
                                        <div class="row">
                                            <h6>{{$titulo7}} :</h6>
{{--                                            <form action="" class="d-flex ">--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <input type="radio" id="age1" name="age" value="30">--}}
{{--                                                    <label for="age1">Férias</label><br>--}}
{{--                                                    <input type="radio" id="age2" name="age" value="60">--}}
{{--                                                    <label for="age2">Baixa</label><br>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <input type="radio" id="age3" name="age" value="100">--}}
{{--                                                    <label for="age3">Ex-colaborador</label><br>--}}
{{--                                                    <input type="radio" id="age3" name="age" value="100">--}}

{{--                                                    <label for="age4">Disponível</label><br><br>--}}
{{--                                                    <a class="btn btn-primary" href="{{ route($route1) }}">--}}
{{--                                                        <i class="fa-solid fa-list"></i></a>--}}
{{--                                                    <input type="submit" value="Submit" class="btn btn-success">--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
                                            <select name="condition">
                                                <option value="FERIAS">FERIAS</option>
                                                <option value="BAIXA">BAIXA</option>
                                                <option value="EM TRABALHO">EM TRABALHO</option>
                                                <option value="DISPONIVEL">DISPONIVEL</option>
                                            </select>

                                            @if(request('condition') === 'FERIAS')
                                                <input hidden="" type="text" name="is_working" value="1">
                                            @elseif(request('condition') === 'BAIXA')
                                                <input hidden="" type="text" name="is_working" value="1">
                                            @elseif(request('condition') === 'EM TRABALHO')
                                                <input hidden="" type="text" name="is_working" value="1">
                                            @elseif(request('condition') === 'DISPONIVEL')
                                                <input hidden="" type="text" name="is_working" value="1">
                                            @endif
                                            @endif
                                        </div>

                                <div class="d-flex justify-content-start gap-2 ">
                                    @if(auth()->user()->getTypeUser() !== 'driver')
                                        <div class="d-flex justify-content-end gap-1 align-content-end w-100">
                                            @if(request()->routeIs('*.travels.*') || request()->routeIs('*.maintenances.*'))
                                                <a class="btn btn-danger" href="{{ route($route1)}}"
                                                   onclick="confirmation_cancel(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Cancelar</a>
                                                @if($driver_state === "CONCLUIDO" || $driver_state === "PROBLEMAS")
                                                    <a class="btn btn-success" href="{{ route($route1) }}"
                                                       onclick="confirmation_conclude(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Concluir</a>
                                                @endif
                                            @endif
                                            @endif
                                            @role('driver')
                                            @if(isset($driver_state))
                                                @php
                                                    $activeTravel = App\Models\Travel::where('driver_id', auth()->id())
                                                        ->where('driver_state', 'ACEITE')
                                                        ->first();
                                                @endphp
                                                @if($driver_state === "POR ACEITAR")
                                                    @if(!$activeTravel)
                                                        <a class="btn btn-success" href="{{ route($route4)}}" onclick="confirmation_accept(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Aceite</a>
                                                        @else
                                                        <p style=" font-weight: bold; color: red">Só pode aceitar nova viagem após concluir a atual</p>
                                                    @endif
                                                @elseif($driver_state === "ACEITE")
                                                    @if($activeTravel)
                                                        <a class="btn btn-danger" href="{{ route($route4)}}" onclick="confirmation_conclude(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Concluir</a>
                                                    @endif
                                                @endif
                                            @endif
                                            @endrole
                                        </div>
                                </div>

                                        @role('admin')
                                        <a class="btn btn-success" href="{{ route($route2, $id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form id="submit" class="form-custom" method="POST"
                                              action="{{route($route3, $id)}}" style="display: inline" onclick="return confirmation_create_edit_form(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <br/>
                                        </form>
                                        @endrole
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


