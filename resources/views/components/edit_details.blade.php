<form id="submit" class="submit" method="POST" action="{{route($route_update, $id)}}" onsubmit="return confirmation_create_edit_form(event)">
    @csrf
    @method('PUT')
    <div class="container ">
        <div class="row d-flex justify-content-center ">
            <div class="col-9 ">
                <div class="card " style="border-radius: .5rem;">
                    <div class="row g-0">
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
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Informações</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>{{$titulo1}}</h6>
                                        <input type="{{$tipo1}}" name="{{$nome1}}" value="{{($input1) }}" @if(isset($disabled1)){{$disabled1}}@endif>
                                        <div class="invalid-feedback">@error($nome1) {{$message}} @enderror</div>
                                    </div>
                                    @if(isset($titulo2))
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo2}}</h6>
                                            <input type={{$tipo2}} name="{{$nome2}}" value="{{($input2) }}">
                                            <div class="invalid-feedback">@error($nome2) {{$message}} @enderror</div>
                                        </div>
                                    @endif
                                </div>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    @if(isset($titulo3))
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo3}}</h6>
                                            <select name="{{$select1}}">
                                                @foreach($array1 as $option1)
                                                    <option value="{{$option1->id}}" {{$selected1 == $option1->id ? 'selected' : ''}}>
                                                        {{ $option1->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(isset($titulo4))
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo4}}</h6>
                                            <select name="{{$select2}}">
                                                @foreach($array2 as $option2)
                                                    <option value="{{ $option2->id }}" {{ $selected2 ==$option2->id ? 'selected' : ''}}>
                                                        {{ $option2->licence_plate }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(isset($titulo5))
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo5}}</h6>
                                            <select name="{{$select3}}">
                                                @foreach($array3 as $option3)
                                                    <option value="{{ $option3->id }}" {{ $selected3 ==$option3->id ? 'selected' : ''}}>
                                                        {{ $option3->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(isset($titulo6))
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo6}}</h6>
                                            <input type="{{$tipo3}}" name="{{$nome3}}" value="{{($input3) }}" @if(isset($disabled2)){{$disabled2}}@endif>
                                            <div class="invalid-feedback">@error($nome3) {{$message}} @enderror</div>
                                        </div>
                                    @endif
                                    @if(isset($titulo7))
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo7}}</h6>
                                            <input type="{{$tipo4}}" name="{{$nome4}}" value="{{($input4) }}">
                                            <div class="invalid-feedback">@error($nome4) {{$message}} @enderror</div>
                                        </div>
                                    @endif
                                </div>
                                @if(isset($titulo8))
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo8}}</h6>

                                            <select name="state">
                                                <option value="PROCESSANDO" {{$selected4 == 'PROCESSANDO' ? 'selected' : ''}}>PROCESSANDO</option>
                                                <option value="CANCELADO" {{$selected4 == 'CANCELADO' ? 'selected' : ''}}>CANCELADO</option>
                                                <option value="CONCLUIDO" {{$selected4 == 'CONCLUIDO' ? 'selected' : ''}}>CONCLUIDO</option>
                                            </select>

                                            @if(request('state') === 'CANCELADO')
                                                <input hidden="" type="text" name="is_traveling" value="0">
                                            @elseif(request('state') === 'CONCLUIDO')
                                                <input hidden="" type="text" name="is_traveling" value="0">
                                            @else
                                                <input hidden="" type="text" name="is_traveling" value="1">
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                @if(isset($titulo9))
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>{{$titulo9}}</h6>
                                            <select name="condition">
                                                <option value="FERIAS">FERIAS</option>
                                                <option value="BAIXA">BAIXA</option>
                                                <option value="EM TRABALHO">EM TRABALHO</option>
                                                <option value="DISPONIVEL">DISPONIVEL</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-start gap-2 ">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <a class="btn btn-danger" href="{{ route($route_show ,$id) }}"><i class="fa-solid fa-ban"></i></a><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
