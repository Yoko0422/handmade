<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{
 public function part()
    {
        return $this->belongsTo('App\Part'); //Partモデルに所属
    }

    public function genru()
    {
        return $this->belongsTo('App\Genru'); //Partモデルに所属
    }
}
