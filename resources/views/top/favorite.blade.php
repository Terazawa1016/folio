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
      @foreach ($favorite_item as $item)
      <li>
        <div class="item">

            <a href="{{$item->link}}"><img class="item-img" src = "{{$item->img}}"></a>

            <div class="item-info">

              <span class="item-name">{{$item->title}}</span>
            </div>
            <form class="like" method="post" action="{{route('preference')}}">
              @csrf
              <input type="hidden" name="id" value="{{$item->id}}" />
              @if ($item->preferences[0]->count)
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
     <ul class="page">{{ $favorite_item->links() }}</ul>
   </div>
@endsection
