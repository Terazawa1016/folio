<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Like;

class BookController extends Controller
{
  public function index(Request $request) {

    $items = Like::orderBy('id','ASC')->take(15)->get();

      return view('home', compact('items'));
  }

}
