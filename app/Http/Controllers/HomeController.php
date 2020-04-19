<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FeedReader;
use App\Favorite;
use App\Http\Requests\CreateRequest;
use Auth;
use App\User;
use App\Like;
use App\Preference;
use GuzzleHttp\Client;


use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function shoplist(Request $request) {

// ユーザのお気に入り追加合計値
       $count_preference = User::find(
        Auth::id()
       )->preference()->sum('count');

       // \DB::enableQueryLog();

       $like = new Like;
       $items = $like->select('likes.link', 'title', 'img', 'category', \DB::raw('preferences.count AS count'),\DB::raw('likes.id AS id'))->leftJoin('preferences',function($join){
         $join->on('likes.id','=','preferences.like_id')
          ->where('preferences.user_id','=', Auth::id());
       });

 // 検索した名前に部分一致する商品情報を取得する
       if($request->has('s')) {
         $items = $items->where('title', 'lIKE', "%{$request->s}%");

       }
// カテゴリー検索
        if($request->has('category')) {

            $items = $items->where([
              'category'=>$request->category
            ]);
          }


       // dd(\DB::getQueryLog());

      $items = $items->orderBy('likes.id','desc')->paginate(10);

      // dd(\DB::getQueryLog());

         return view('top.shop', compact('items', 'count_preference'));
     }

     public function favorite(Request $request)
     {

 // ユーザのお気に入り追加合計値
        $count_preference = User::find(
         Auth::id()
        )->preference()->sum('count');

       // ユーザのお気に入り一覧
        $like = new Like;

  // 検索した名前に部分一致する商品情報を取得する
        $like = $like->whereHas('Preferences', function($query){
          $query->where('user_id', Auth::id());
        });

        if($request->has('s')) {
          $like = $like->whereHas('Preferences', function($query) use($request){
            $query->where('title','like', '%'. $request->s.'%');
          });
        }

        $favorite_item = $like->paginate(10);

      return view('top.favorite', compact('favorite_item', 'count_preference'));
     }

// ランキング一覧表示
     public function rank(Request $request)
     {
 // ユーザのお気に入り追加合計値
        $count_preference = User::find(
         Auth::id()
        )->preference()->sum('count');

        $like = new Like;
        $items = $like->select('likes.link', 'title', 'img', 'category', 'total', 'preferences.count AS count','likes.id AS id')->leftJoin('preferences',function($join){
          $join->on('likes.id','=','preferences.like_id')
           ->where('preferences.user_id','=', Auth::id());
        });

// ランキング一覧
  // linkが同じものを一緒にし、countは合計する
         $rank_count = Preference::select(
           'like_id', \DB::raw('SUM(count) AS total'))->groupBy('like_id');

           // \DB::enableQueryLog();

  // サブクエリで元々のLikeテーブルのlinkと上の仮で作成したLikeのリンクを結合する
         $items = $items->joinSub($rank_count, 'rank_count', function($join) {
           $join->on('likes.id', '=', 'rank_count.like_id');
         })->where('total', '>', 0)->orderBy('rank_count.total', 'desc');

   // 検索した名前に部分一致する商品情報を取得する
         if($request->has('s')) {
           $items = $items->where('title', 'lIKE', "%{$request->s}%");

         }

       // dd(\DB::getQueryLog());

      $items = $items->orderBy('likes.id','asc')->paginate(10);


      // \DB::enableQueryLog();

      // dd(\DB::getQueryLog());

         return view('top.rank', compact('items', 'count_preference'));

     }

     public function preference(Request $request)
     {

// 商品のお気に入り追加処理
       $input = $request->all();
       $input['user_id'] = Auth::id();
       unset($input['_token']);


       $preference =  Preference::where([
         'user_id'=>$input['user_id'],
         'like_id'=>$input['id']
         ])->first();
// dd($input);

       if($preference) {

         $preference->delete();
       } else {
         $preference = new Preference;
         $input['like_id'] = $input['id'];
         $preference->fill($input);
         $preference->count = 1;
         $preference->save();
       }

       return redirect('/shop');
     }

// API保存処理
     public function store(CreateRequest $request)
     {
       $input = $request->all();
       $input['user_id'] = Auth::id();
       unset($input['_token']);

       $isbn = $input['isbn'];

       if(!empty($isbn)) {
        $client = new \GuzzleHttp\Client();
         $res = $client->request('GET', 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20170404', [
             'query' => [
               'format' => 'json',
               'keyword' => '%E6%9C%AC',
               'booksGenreId' => '000',
                'applicationId' => '1077710735946027245',
                'isbnjan' => urlencode($isbn)
              ]
         ]);

         $json = json_decode($res->getBody(), true);

         // dd($json);

         if ($json['count'] > 0 ) {

           $like = new Like;
           $like->user_id = Auth::id();
           $like->link = $json['Items'][0]['Item']['itemUrl'];
           $like->title = $json['Items'][0]['Item']['title'];
           $like->img = $json['Items'][0]['Item']['largeImageUrl'];
           $like->category = $input['category'];
           $like->count = 0;

           $like->save();
           return redirect('/shop');

         }
       }
          return redirect('/create')->with('flash_message', '商品が登録できませんでした');
     }

     public function create(){
 // ユーザのお気に入り追加合計値
        $count_preference = User::find(
         Auth::id()
        )->preference()->sum('count');
       return view('top.create',compact('count_preference'));
     }
}
