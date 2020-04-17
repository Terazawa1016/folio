<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>SHOP</title>
  @yield('styles')
  <link rel="stylesheet" href="{{asset('./css/app.css')}}">
  <link rel="stylesheet" href="{{ asset('css/top.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>

</head>
<body>
  <header>
    <div class="header-box">
      <a href="{{route('top')}}">
        <img class="logo" src="/storage/images/logo_img.png" alt="TEST SHOP">
      </a>
      <div class="header-shop">
      <form method="post" class="header-logout" action="{{route('logout')}}">
        @csrf
        <input class="nemu btn btn-flat-border" type="submit" value="logout">
      </form>

      {{--<a href="{{route('cart')}}" class="header-cart"><i class="cart fas fa-cart-arrow-down fa-2x"></i></a>--}}
      {{--<p class="nemu user_name">user：{{Auth::user()->name}}</p>--}}

        <div class="text-right mb-2">good：
             {{--<span class="badge badge-pill badge-success">{{ $count_favorite }}</span>--}}
        </div>
      </div>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
  @if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
  @endif
  @yield('scripts')
</body>
</html>
