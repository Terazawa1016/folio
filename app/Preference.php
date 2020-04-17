<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
  protected $fillable = [
    'user_id', 'like_id', 'count'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

    public function like()
    {
      return $this->belongsTo('App\Like');
    }
}
