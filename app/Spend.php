<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{
 public function part()
    {
        return $this->belongsTo('App\Part');
    }
}
