<section class="vh-100">
    <div class="container py-4 h-100">
        <div class="row d-flex justify-content-center h-100">
            <div class="col col-lg-9 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
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
                                <h6></h6>
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
                                @endif
                                @if(isset($titulo5))
                                <h6></h6>
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
                                <div class="d-flex justify-content-start gap-2 ">
                                    <a class="btn btn-primary" href="{{ route($route1) }}"><i class="fa-solid fa-list"></i></a>
                                    @role('admin')
                                    <a class="btn btn-success" href="{{ route($route2, $id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form class="form-custom" method="POST"
                                          action="{{route($route3, $id)}}" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>
                                        </button><br />
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
