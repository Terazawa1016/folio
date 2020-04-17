<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrefController extends Controller
{
    public function list()
    {
      return \App\Preference::all();
    }
}
