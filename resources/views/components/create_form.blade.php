<form id="submit" class="form-custom" method="POST" action="{{route($route_create) }}" onsubmit="return confirmation_create_edit_form(event)">
    @csrf <!-- Token de proteção contra falsificação de solicitações entre sites (CSRF) -->
    <section class="vh-100">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center h-100">
                <div class="col col-lg-9 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <!-- Coluna esquerda com imagem e detalhes -->
                            <div class="col-md-4 text-center text-white {{$cor}}"
                                 style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{asset($imagem)}}"
                                     alt="Avatar" class="img-fluid my-5" style="width: 200px;" />
                                @if(isset($nome))
                                    <h4>{{$nome}}</h4>
                                @endif
                                @if(isset($descricao))
                                    <h5 class="pb-2">{{$descricao}}</h5>
                                @endif
                            </div>
                            <!-- Coluna direita com campos do formulário -->
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Informações</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <!-- Primeiro conjunto de campos do formulário -->
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo1}}</h6>
                                            <input type="{{$tipo1}}" name="{{$input_nome1}}" value="{{ old($input_nome1) }}">
                                            <div class="invalid-feedback">@error($input_nome1) {{$message}} @enderror</div>
                                        </div>
                                        @if(isset($titulo2))
                                            <!-- Segundo conjunto de campos do formulário (se aplicável) -->
                                            <div class="col-6 mb-3">
                                                <h6>{{$titulo2}}</h6>
                                                <input type="{{$tipo2}}" name="{{$input_nome2}}" value="{{ old($input_nome2) }}">
                                                <div class="invalid-feedback">@error($input_nome2) {{$message}} @enderror</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Campos adicionais do formulário -->
                                    @if(isset($titulo3))
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>{{$titulo3}}</h6>
                                                @if(isset($select3))
                                                    <!-- Menu suspenso para $titulo3 -->
                                                    <select name="{{$select3}}">
                                                        @foreach($array3 as $option3)
                                                            <option value="{{ $option3->id }}">{{ $option3->name }}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <!-- Campo de entrada para $titulo3 -->
                                                    <input type="{{$tipo3}}" name="{{$input_nome3}}" value="{{ old($input_nome3) }}">
                                                    <div class="invalid-feedback">@error($input_nome3) {{$message}} @enderror</div>
                                                @endif
                                            </div>
                                            <div class="col-6 mb-3">
                                                <!-- Campo adicional do formulário com base em condições -->
                                                @if(isset($titulo4))
                                                    <h6>{{$titulo4}}</h6>
                                                    @if(isset($select4))
                                                        <!-- Menu suspenso para $titulo4 -->
                                                        <select name="{{$select4}}">
                                                            @foreach($array4 as $option4)
                                                                <option value="{{ $option4->id }}">{{ $option4->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <!-- Campo de entrada para $titulo4 -->
                                                        <input type="{{$tipo4}}" name="{{$input_nome4}}" value="{{ old($input_nome4) }}">
                                                        <div class="invalid-feedback">@error($input_nome4) {{$message}} @enderror</div>
                                                    @endif
                                                @elseif(isset($titulo8))
                                                    <!-- Caso especial para $titulo8 -->
                                                    <div class="col-6 mb-3">
                                                            <h6>{{$titulo8}}</h6>
                                                            <select name="{{$select8}}">
                                                                <option value="1">admin</option>
                                                                <option value="2">gestor</option>
                                                            </select>
                                                    </div>
                                                @endif
                                            </div>
                                        </div
                                    @endif
                                    <!-- Outro conjunto de campos do formulário -->
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <!-- Campo adicional do formulário com base em condições -->
                                            @if(isset($titulo5))
                                                <h6>{{$titulo5}}</h6>
                                                <input type="{{$tipo5}}" name="{{$input_nome5}}" value="{{ old($input_nome5) }}">
                                                <div class="invalid-feedback">@error($input_nome5) {{$message}} @enderror</div>
                                            @endif
                                            @if(isset($titulo6))
                                                <!-- Menu suspenso para $titulo6 -->
                                                <h6>{{$titulo6}}</h6>
                                                <select name="{{$select6}}">
                                                    @foreach($array6 as $option6)
                                                        <option value="{{ $option6->id }}">{{ $option6->user->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            @if(isset($titulo7))
                                                <!-- Menu suspenso para $titulo7 -->
                                                <h6>{{$titulo7}}</h6>
                                                <select name="{{$select7}}">
                                                    @foreach($array7 as $option7)
                                                        <option value="{{ $option7->id }}">{{ $option7->licence_plate }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Botões de envio do formulário -->
                                    <div class="d-flex justify-content-start gap-2 ">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-circle-plus"></i>
                                        </button>
                                        <a class="btn btn-danger" href="{{ route($cancelar) }}"><i class="fa-solid fa-ban"></i></a><br />
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

