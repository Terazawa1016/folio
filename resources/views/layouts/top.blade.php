<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>BOOK LIST</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/top.css') }}">
  <link rel="stylesheet" href="{{ asset('css/top_small.css') }}"/>

</head>
<body>
  <header>
    <div class="header-box">
      <a href="{{route('shop')}}">
        <img class="logo" src="/storage/images/logo_img.png" alt="TEST SHOP">
      </a>
      <div class="header-shop">
      <form method="post" class="header-logout" action="{{route('logout')}}">
        @csrf
        <input class="nemu btn btn-flat-border" type="submit" value="logout">
      </form>

      <p class="nemu user_name">user：{{Auth::user()->name}}</p>

        @if (!empty($count_preference))
        <div class="text-right mb-2">good：
             <span class="badge badge-pill badge-success">{{ $count_preference }}</span>
        </div>
        @endif

        <form id="form4" action="" method="get">
          <input id="sbox4"  id="s" name="s" type="text" placeholder="アイテムを探す" />
          <button id="sbtn4" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>

      <nav class="header-menu">
           <ul class="header-list" id="menu">
               <li><a href="#">category</a>
                  <ul>
                    <li><a href="/shop?category=beginner">beginner</a></li>
                    <li><a href="/shop?category=HTML">HTML</a></li>
                    <li><a href="/shop?category=JavaScript">JavaScript</a></li>
                    <li><a href="/shop?category=Ruby">Ruby</a></li>
                    <li><a href="/shop?category=PHP">PHP</a></li>
                    <li><a href="/shop?category=java">java</a></li>
                    <li><a href="/shop?category=Python">Python</a></li>
                    <li><a href="/shop?category=C">C</a></li>
                    <li><a href="/shop?category=WordPress">WordPress</a></li>
                    <li><a href="/shop?category=iOS">iOS</a></li>
                    <li><a href="/shop?category=Android">Android</a></li>
                  </ul>
                </li>
               <li><a href="#">item</a>
                 <ul>
                   <li><a href="{{route('shop')}}">LIST</a></li>
                   <li><a href="{{route('create')}}">CREATE</a></li>
                 </ul>
               </li>
               <li>
                 <a href="{{route('favorite')}}" class="favorite_id">favorite
                 </a>
               </li>
               <li>
                 <a href="{{route('rank')}}">popular</a>
               </li>
               <li>
                <a href="{{route('play')}}">article</a>
              </li>
           </ul>
       </nav>
  </header>
  @yield('content')
  <footer>
    <nav>
    {{--<ul class="flex-bottom">
        <li><a href="#" target="_blank">sitemap</a></li>
        <li><a href="#" target="_blank">privacy</a></li>
        <li><a href="#" target="_blank">form</a></li>
        <li><a href="#" target="_blank">guide</a></li>
    </ul>--}}
    </nav>
    <p><small> &#169; TestUser All Rights Reserved.</small></p>
</footer>


<script type="text/javascript">

$(document).ready(function() {
    $('.like_btn').click(function() {
        $(this).parent().submit();
    });
});

$(document).ready(function() {
    $('.favorite_id').click(function() {
      //自分自身の親要素(フォーム)を参照する
      //サブミットを実行
        $(this).parent().submit();
    });
});

</script>
</body>
</html>
