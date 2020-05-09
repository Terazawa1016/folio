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

class PlayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function play(Request $request) {

        $input = $request->input('title');
        $page = $request->input('page', 1);

        // $request->flashOnly(['title']);               
         $request->flash();

        $input = urlencode($input);

    // ユーザのお気に入り追加合計値
        $count_preference = User::find(
        Auth::id()
        )->preference()->sum('count');


        // \DB::enableQueryLog();
        
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', "https://qiita.com/api/v2/items?page={$page}&per_page=20&query={$input}");
            $json = json_decode($res->getBody(), true);
        
// dd($json);

            $items = $json;

        // dd(\DB::getQueryLog());

        // dd($items);
        // dd(\DB::getQueryLog());

            return view('top.play', compact('items', 'count_preference'));
        }        
}
