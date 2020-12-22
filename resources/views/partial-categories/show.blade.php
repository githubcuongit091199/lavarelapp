    @foreach ($categories as $item)
        <a class="collapse-item" href="{{route('categories.show',$item->id)}}">{{$item->type}}</a>
    @endforeach
