<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
  protected $fillable = [
    'link', 'title', 'img', 'user_id', 'count'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
