@extends('layouts.top')

@section('content')
  <div class="content">

    {{--エラー表示--}}
    @if ($errors->any())
      <p>
        @foreach ($errors->all() as $err)
        {{$err}}<br>
        @endforeach
      </p>
    @endif
    <ul class="item-list">
      @foreach ($hash as $item)
      <li>
        <div class="item">

            <a href="{{$item['link']}}"><img class="item-img" src = "{{$item['img']}}"></a>

            <div class="item-info">

              <span class="item-name">{{$item['title']}}</span>
              <span class="item-price">{{$item['date']}}</span>
            </div>
            <form class="like" method="post" action="{{route('favorite')}}">
              @csrf
              <input type="hidden" name="link" value="{{$item['link']}}" />
              <input type="hidden" name="title" value="{{$item['title']}}" />
              <input type="hidden" name="img" value="{{$item['img']}}">
              @if ($item['liked'] || $is_favorite || isset($item['id'], $favorited[$item['id']]))
              <a class="like_btn btn-bord">
              登録済み
              </a>
              @else
              <a class="like_btn btn-gradient-simple">
              お気に入り追加
              </a>
              @endif
            </form>
        </div>
      </li>
      @endforeach
     </ul>
   </div>

@endsection
