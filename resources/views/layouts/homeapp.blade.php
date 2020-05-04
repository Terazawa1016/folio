<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>BOOK LIST</title>
  <link rel="stylesheet" href="{{ asset('css/top.css') }}">
  <link rel="stylesheet" href="{{ asset('css/con_small.css') }}"/>


  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous">


</head>
<body>
  <header>
    <div class="header-box">
      <a href="{{route('shop')}}">
        <img class="logo" src="/storage/images/logo_img.png" alt="TEST SHOP">
      </a>
      <div class="header-shop">
      <form method="get" class="header-logout" action="{{route('login')}}">
        @csrf
        <input class="nemu btn btn-flat-border" type="submit" value="login">
      </form>
      </div>
    </div>

      <nav class="header-menu">
           <ul class="header-list" id="menu">
               <li><a href="{{route('shop')}}">category</a>                  
                </li>
               <li><a href="{{route('shop')}}">item</a></li>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" charset="utf-8"/>


<script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
              autoplay:true,
              arrows:false,
              // dots:true
            });
        });
</script>

</body>
</html>
