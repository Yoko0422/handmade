<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genru extends Model
{
    public function parts()
    {
          return $this->hasMany('App\Part'); //Partモデルに所属
    }
    
    public function spends()
    {
          return $this->hasMany('App\Spend'); //Spendモデルに所属
    }
    
     public function user()
    {
          return $this->belongsTo('App\User'); //Userモデルに所属
    }
    
}
