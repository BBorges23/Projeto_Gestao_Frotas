<meta name="csrf-token" content="{{ csrf_token() }}">
<section>
    <div class="container py-4">
        <div class="row d-flex justify-content-center">
            <div class="col col-lg-9 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <!-- Coluna de imagem e informações do utilizador -->
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
                        <!-- Coluna principal com informações detalhadas -->
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6 class="d-flex justify-content-between">Informações
                                    @role('driver')
                                    @if(isset($driver_state))
                                        @if($driver_state == 'ACEITE' || $driver_state == 'PROBLEMAS' )
                                            <!-- Botão para lidar com problemas -->
                                            <a style="color: #e10505;" href="{{ route($route4)}}" onclick="confirmation_problems(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}" title="Problemas"><i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #e10505;"></i></a>
                                        @endif
                                    @endif
                                    @endrole</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <!-- Coluna esquerda com informações -->
                                    <div class="col-6 mb-3">
                                        <h6>{{$titulo1}}</h6>
                                        <p class="text-muted">{{$informacao1}}</p>
                                    </div>
                                    <!-- Condição para a coluna direita -->
                                    @if(isset($titulo2))
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo2}}</h6>
                                            <p class="text-muted">{{$informacao2}}</p>
                                        </div>
                                    @endif
                                </div>
                                <!-- Condição para informações adicionais -->
                                @if(isset($titulo3))
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <!-- Coluna esquerda com informações -->
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo3}}</h6>
                                            <p class="text-muted">{{$informacao3}}</p>
                                        </div>
                                        <!-- Coluna direita -->
                                        <div class="col-6 mb-3">
                                            <!-- Condição para a coluna direita -->
                                            @if(isset($titulo4))
                                                <h6>{{$titulo4}}</h6>
                                                <p class="text-muted">{{$informacao4}}</p>
                                            @endif
                                            <!-- Condição para o papel de gestor -->
                                            @role('gestor')
                                                @if(isset($titulo7) )
                                                    <!-- Formulário para atualizar condição do motorista -->
                                                    <form id="submit" class="submit" method="POST" action="{{ route($route_update, $id)}}" onsubmit="return confirmation_create_edit_form(event)">
                                                        @csrf
                                                        @method('PUT')
                                                        <h6>{{$titulo7}}:</h6>
                                                        <!-- Seleção da nova condição -->
                                                        <select name="condition" class="p-2">
                                                            <option value="FERIAS" {{$driver_state == 'FERIAS' ? 'selected' : ''}}>FERIAS</option>
                                                            <option value="BAIXA" {{$driver_state == 'BAIXA' ? 'selected' : ''}}>BAIXA</option>
                                                            <option value="DISPONIVEL" {{$driver_state == 'DISPONIVEL' ? 'selected' : ''}}>DISPONIVEL</option>
                                                        </select>
                                                        <!-- Botão para enviar o formulário -->
                                                        <button type="submit" class="btn btn-success mt-2"><i class="fa-solid fa-pen-to-square"></i></button>
                                                    </form>
                                                @endif
                                            @endrole
                                        </div>
                                    </div>
                                    <!-- Condição para exibir observações -->
                                    @if(request()->routeIs("*.travels.show"))
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <h3>Observações</h3>
                                            <p>{!! nl2br(e($status_driver)) !!}</p>
                                        </div>
                                    @endif
                                    @if(request()->routeIs("*.maintenances.show"))
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <h3>Observações</h3>
                                            <p>{{ $status_driver }}</p>
                                        </div>
                                    @endif
                                @endif
                                <!-- Condição para mais informações -->
                                @if(isset($titulo5))
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <!-- Coluna esquerda com informações -->
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo5}}</h6>
                                            <p class="text-muted">{{$informacao5}}</p>
                                        </div>
                                        <!-- Coluna direita -->
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo6}}</h6>
                                            <p class="text-muted">{{$informacao6}}</p>
                                        </div>
                                        @endif
                                        <!-- Condição para os botões -->
                                        <div class="d-flex justify-content-start gap-2 ">
                                            <!-- Condição para o tipo de utilizador -->
                                            @if(auth()->user()->getTypeUser() !== 'driver')
                                                <div class="d-flex justify-content-end gap-1 align-content-end w-100">
                                                    <!-- Condição para as viagens -->
                                                    @if(request()->routeIs('*.travels.*'))
                                                        @if($state === "PROCESSANDO")
                                                        <a class="btn btn-danger" href="{{ route($route1)}}"
                                                           onclick="confirmation_cancel(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Cancelar</a>
                                                            @if($driver_state === "CONCLUIDO" || $driver_state === "PROBLEMAS")
                                                            <a class="btn btn-success" href="{{ route($route1) }}"
                                                               onclick="confirmation_conclude(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Concluir</a>
                                                            @endif
                                                        @endif
                                                    <!-- Condição para as manutenções -->
                                                    @elseif(request()->routeIs('*.maintenances.*'))
                                                        @if($maintenance_state === "PROCESSANDO")
                                                            <a class="btn btn-danger" href="{{ route($route1)}}"
                                                               onclick="confirmation_cancel(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Cancelar</a>
                                                            <a class="btn btn-success" href="{{ route($route1) }}"
                                                               onclick="confirmation_conclude(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Concluir</a>
                                                        @endif
                                                    @endif
                                                    @endif
                                                    <!-- Condição para o papel de motorista -->
                                                    @role('driver')
                                                    @if(isset($driver_state))
                                                        <!-- Variáveis para verificar a viagem ativa e a condição do motorista -->
                                                        @php
                                                            $activeTravel = App\Models\Travel::where('driver_id', auth()->user()->driver->id)
                                                                ->where('driver_state', 'ACEITE')
                                                                ->first();

                                                            $driver_condition = App\Models\Driver::query()
                                                                ->where('id', auth()->user()->driver->id)
                                                                ->value('condition')
                                                        @endphp
                                                            <!-- Condições para os botões do motorista -->
                                                        @if($driver_state === "POR ACEITAR" )
                                                            @if(!$activeTravel && $date_start <= $date_now && $driver_condition == 'DISPONIVEL')
                                                                <a class="btn btn-success" href="{{ route($route4)}}" onclick="confirmation_accept(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Aceitar</a>
                                                            @elseif($date_start > $date_now )
                                                                    <p style=" font-weight: bold; color: red">Viagem inicia em {{date('d-m-Y', strtotime($date_start))}} </p>
                                                            @else
                                                                <p style=" font-weight: bold; color: red">Só pode aceitar nova viagem após concluir a atual</p>
                                                            @endif
                                                        @elseif(($driver_state === "ACEITE" || $driver_state === "PROBLEMAS") && $driver_condition === "EM TRABALHO")
                                                            <a class="btn btn-danger" href="{{ route($route4)}}" onclick="confirmation_conclude(event)" name="{{$id}}" id="{{basename(parse_url(route($route1))['path'])}}">Concluir</a>
                                                        @else
                                                            @if($driver_condition === "BAIXA")
                                                                <p style=" font-weight: bold; color: red">Motorista está de baixa</p>
                                                            @elseif($driver_condition === "FERIAS")
                                                                <p style=" font-weight: bold; color: red">Motorista está de férias</p>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @endrole
                                                </div>
                                        </div>
                                        <!-- Condição para o papel de admin -->
                                        @role('admin')
                                        @if(isset($route2))
                                            <!-- Botão para editar -->
                                            <a class="btn btn-success" href="{{ route($route2, $id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <!-- Condição para o botão de excluir -->
                                            @if(isset($route3))
                                                <form id="submit" class="form-custom" method="POST"
                                                      action="{{route($route3, $id)}}" style="display: inline" onclick="return confirmation_create_edit_form(event)">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- Botão para excluir -->
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                    <br/>
                                                </form>
                                            @endif
                                        @endif
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
</form>



