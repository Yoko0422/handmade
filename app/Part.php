<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public function spends()
    {
          return $this->hasMany('App\Spend'); //Spendモデルに所属
    }
    
     public function stock()
    {
          return $this->hasOne('App\Stock'); //Stockモデルに所属
    }
    
    public function genru()
    {
          return $this->belongsTo('App\Genru'); //Genruモデルに所属
    }
    
      public function user()
    {
          return $this->belongsTo('App\User'); //Userモデルに所属
    }
}
