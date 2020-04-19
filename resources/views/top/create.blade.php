@extends('layouts.top')

@section('content')
<body>
    <section class="create_book">

{{--エラー表示--}}
@if ($errors->any())
  <p class="errors">
    @foreach ($errors->all() as $err)
    {{$err}}<br>
    @endforeach
  </p>
@endif

{{--フラッシュメッセージ--}}
 @if (session('flash_message'))
     <div class="errors flash_message">
         {{ session('flash_message') }}
     </div>
 @endif
      <div class="create_book">
        <h2 class="create book_title">新規書籍追加</h2>
        <div class="aleat">
            <p class="book_aleat">※登録したい楽天ブックスのISBNコードを入力してください</p>
            <p class="book_aleat">※中古販売や古い書籍に関しては登録ができない場合がございます</p>
            <p class="book_aleat">※サービスのコンセプトに合わない商品の追加は管理者側で削除する場合がございます</p>
        </div>

        <form method="post" enctype="multipart/form-data" action="{{route('store')}}">
          @csrf
            <div class="create create_title"><label>ISBNコード: <input type="text" name="isbn" value="{{old('isbn')}}"></label></div>

            <div class="create create_category">
              カテゴリー:
              <select name="category">
                <option title="0" value="0">----</option>
                <option value="beginner" @if('beginner' === old('category')) selected @endif>ビギナー</option>
                <option value="html" @if('html' === old('category')) selected @endif>HTML</option>
                <option value="ruby" @if('ruby' === old('category')) selected @endif>Ruby</option>
                <option value="php" @if('php' === old('category')) selected @endif>PHP</option>
                <option value="java" @if('java' === old('category')) selected @endif>JAVA</option>
                <option value="javascript" @if('javascript' === old('category')) selected @endif>JavaScript</option>
                <option value="python" @if('python' === old('category')) selected @endif>Python</option>
                <option value="c" @if('c' === old('category')) selected @endif>C</option>
                <option value="wordpress" @if('wordpress' === old('category')) selected @endif>WordPress</option>
                <option value="ios" @if('ios' === old('category')) selected @endif>iOS</option>
                <option value="android" @if('android' === old('category')) selected @endif>Android</option>
              </select>
            </div>
          <div class="create"><input class="btn2-square-little-rich" type="submit" value="登録する"></div>
          @csrf
        </form>
      </div>
    </section>
  @endsection
