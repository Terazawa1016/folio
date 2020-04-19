<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = [
    'user_id', 'link', 'title', 'img', 'count'
  ];

  public function User()
  {
    return $this->belongsTo('App\User');
  }
  public function Preferences()
  {
    return $this->hasMany('App\Preference');
  }
}
