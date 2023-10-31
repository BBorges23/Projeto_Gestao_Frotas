<div class="small-box  {{$bg}}">
    <div class="inner" >
        <h3 style="overflow: hidden; display: -webkit-box;-webkit-line-clamp: 4;-webkit-box-orient: vertical;height: 2.5em;">
            @if(isset($icon_label))
                <i class="{{ $icon_label }}"></i>
            @endif
            {{$label}}
        </h3>
        <p>
            @if(isset($icon_titulo))
                <i class="{{ $icon_titulo }}"></i>
            @endif
            {{$titulo}}</p>

        @if (isset($sub_titulo))
            <p>{{$sub_titulo}}</p>
        @endif

    </div>
    <div class="icon">
        <i class="{{$icon}}"></i>
    </div>

    <a href="{{$link}}" class="small-box-footer">
        Mais Informações <i class="fas fa-arrow-circle-right"></i>
    </a>
</div>
