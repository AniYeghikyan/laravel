<div class="links">
    @if(!empty($links))
        @for($i = 0; $i < count($links); $i++)
            <a href="{{$links[$i]['link']}}">{{$links[$i]['name']}}</a>
        @endfor
    @endif
</div>
