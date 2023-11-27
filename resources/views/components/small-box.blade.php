@if(isset($driver_state))
    @if($driver_state === "CONCLUIDO")
        <!-- Caixa pequena para estado "CONCLUIDO" com fundo verde -->
        <div class="small-box bg-success">
    @elseif($driver_state === "ACEITE")
        <!-- Caixa pequena para estado "ACEITE" com fundo amarelo -->
        <div class="small-box bg-warning">
    @elseif($driver_state === "PROBLEMAS")
        <!-- Caixa pequena para estado "PROBLEMAS" com fundo vermelho -->
        <div class="small-box bg-danger">
    @elseif($driver_state === "POR ACEITAR")
        <!-- Caixa pequena para estado "POR ACEITAR" com fundo cinza claro -->
        <div class="small-box bg-gray-light">
    @elseif($driver_state === "EM TRABALHO")
        <!-- Caixa pequena para estado "EM TRABALHO" com fundo azul -->
        <div class="small-box bg-info">
    @elseif($driver_state === "BAIXA")
        <!-- Caixa pequena para estado "BAIXA" com fundo cinza escuro -->
         <div class="small-box bg-secondary">
    @elseif($driver_state === "FERIAS")
        <!-- Caixa pequena para estado "FERIAS" com fundo amarelo -->
          <div class="small-box bg-warning">
    @elseif($driver_state === "EX_COLABORADOR")
        <!-- Caixa pequena para estado "EX_COLABORADOR" com fundo vermelho -->
          <div class="small-box bg-danger">
    @elseif($driver_state === "DISPONIVEL")
        <!-- Caixa pequena para estado "DISPONIVEL" com fundo verde -->
          <div class="small-box bg-success">
    @else
        <!-- Caixa pequena padrão caso não haja correspondência -->
        <div class="small-box">
    @endif
@else
        <!-- Caso $driver_state não esteja definido -->
    <div class="small-box {{$bg}}">
@endif

        <div class="inner">
            <!-- Título -->
            <h3 style="overflow: hidden; display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;height: 2.5em;">
                @if(isset($icon_label))
                    <!-- Ícone associado ao rótulo -->
                    <i class="{{ $icon_label }}"></i>
                @endif
                {{$label}}
            </h3>
            <!-- Subtítulo -->
            <p class="fs-5" style="overflow: hidden; display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;height: 2em;">
                @if(isset($icon_titulo))
                    <!-- Ícone associado ao título -->
                    <i class="{{ $icon_titulo }}"></i>
                @endif
                {{$titulo}}
            </p>

            @if (isset($sub_titulo))
                <!-- Subtítulo adicional -->
                <p class="fs-5" style="overflow: hidden; display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;height: 2em;">{{$sub_titulo}} </p>

            @endif
            @if (isset($calendario))
                <!-- Exibição de informações de calendário -->
                <p class="text-start fs-6 pe-3" >{{$calendario}}</p>
            @endif
        </div>

        @if(isset($driver_state))
            <!-- Exibição do estado do motorista -->
            <p class="text-end fs-5 pe-3">{{$driver_state}}</p>
        @endif

        <div class="icon">
            <!-- Ícone principal -->
            <i class="{{$icon}}"></i>
        </div>
        <!-- Link para mais informações -->
        <a href="{{$link}}" class="small-box-footer">
            Mais Informações <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
