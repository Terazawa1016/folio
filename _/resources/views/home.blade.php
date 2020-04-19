@extends('layouts.homeapp')

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
      <div class="home_img">
          <div class="home slider">
              <div class="home_box" style="position: relative;">
                <a href="http://book.portfolio.cfbx.jp/shop">
                  <img src="/storage/images/folio1.jpeg" alt=""  >
                <p style="position: absolute top; color:#fff">おすすめの本を紹介しております</p>
                </a>
              </div>


              <div class="home_box" style="position: relative;">
                <a href="http://book.portfolio.cfbx.jp/shop">

                <img src="/storage/images/folio1_2.jpeg" alt="">
                <p class="hello1" style="position: absolute top; color:#fff">プログラミング初心者向けの教材を紹介</p>
              </a>
              </div>


              <div class="home_box" style="position: relative;">
                <a href="http://book.portfolio.cfbx.jp/shop">
                <img src="/storage/images/folio1_3.jpeg" alt="">
                <p class="hello2" style="position: absolute top; color:#fff">気に入ったものをストックしましょう！</p>
              </a>
              </div>
      </div>
    </div>
      @foreach ($items as $item)
      <li>
        <div class="item">

            <a href="{{route('shop')}}"><img class="item-img" src = "{{$item->img}}"></a>

            <div class="item-info">

              <span class="item-name">{{$item->title}}</span>
            </div>

        </div>
      </li>
      @endforeach
     </ul>
   </div>
@endsection
