@extends('layouts.playapp')

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
        <h2 class="create book_title">Qiita記事で検索</h2>

        <form method="get" enctype="multipart/form-data">
          @csrf
            <div class="create create_title"><label>検索ワード: <input type="text" name="title" value="{{ old('title') }}"></label></div>          
            <div class="create"><input class="btn2-square-little-rich" type="submit" value="検索"></div>

            @if (!empty($items))

            <div class="form_page">

                @php
                    $page = old('page')? old('page'):1;
                @endphp

                @if ((old('page') -1) > 0 )
                <div class="create page_status"><input class="button-shadow" name="page" type="submit" value="{{$page -1 }}"></div>
                @endif

                <div class="create page_status">{{ $page }}</div>
                <div class="create page_status"><input class="button-shadow" name="page" type="submit" value="{{$page +1 }}"></div>
            </div>
            @endif
        </form>
      </div>
      @if (!empty($items))
      <h2 class="event_msg">情報の一覧・変更</h2>
        <table class="kakomi-maru1">
            <tr>
                <th>タイトル</th>
                <th>いいね数</th>
                <th>コメント数</th>
                <th>作成日</th>
            </tr>
            @foreach ($items as $item)
            <tr>
                <td class="img_size">
                  <a href="{{$item['url']}}">{{$item['title']}}</a>
                </td>
                <td class="tool name_width">
                  {{ $item['likes_count'] }}
                </td>
                <td class="tool_comment">
                  {{ $item['comments_count'] }}                    
                </td>
                <td class="tool_delete">
                  {{ $item['updated_at'] }}
                </td>
            </tr>
            @endforeach
        </table>
      @endif
    </section>
  @endsection
