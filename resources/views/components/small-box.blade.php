@if(isset($driver_state))
@if($driver_state === "CONCLUIDO")
    <div class="small-box bg-success">
@elseif($driver_state === "ACEITE")
    <div class="small-box bg-warning">
@elseif($driver_state === "PROBLEMAS")
    <div class="small-box bg-danger">
@elseif($driver_state === "POR ACEITAR")
    <div class="small-box bg-gray-light">

@elseif($driver_state === "EM TRABALHO")
    <div class="small-box bg-info">
@elseif($driver_state === "BAIXA")
     <div class="small-box bg-secondary">
@elseif($driver_state === "FERIAS")
      <div class="small-box bg-warning">
@elseif($driver_state === "EX_COLABORADOR")
      <div class="small-box bg-danger">
@elseif($driver_state === "DISPONIVEL")
      <div class="small-box bg-success">
@else
    <div class="small-box">
@endif
@else
    <div class="small-box {{$bg}}">
        @endif

        <div class="inner">
            <h3 style="overflow: hidden; display: -webkit-box;-webkit-line-clamp: 4;-webkit-box-orient: vertical;height: 2.5em;">
                @if(isset($icon_label))
                    <i class="{{ $icon_label }}"></i>
                @endif
                {{$label}}
            </h3>
            <p class="fs-5">
                @if(isset($icon_titulo))
                    <i class="{{ $icon_titulo }}"></i>
                @endif
                {{$titulo}}
            </p>

            @if (isset($sub_titulo))
                <p class="fs-5">{{$sub_titulo}} </p>
                @if (isset($calendario))
                    <p class="text-start fs-6 pe-3">{{$calendario}}</p>
                @endif
            @endif
        </div>

        @if(isset($driver_state))
            <p class="text-end fs-5 pe-3">{{$driver_state}}</p>
        @endif

        <div class="icon">
            <i class="{{$icon}}"></i>
        </div>

        <a href="{{$link}}" class="small-box-footer">
            Mais Informações <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
