<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LikeController extends Controller
{
  public function store(Request $request, $id)
  {
          Auth::user()->like($id);
          return back();
  }

  public function destroy($id)
  {
          Auth::user()->dislike($id);
          return back();
  }
}
