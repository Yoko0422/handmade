<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public function part(){
        return $this->belongTo('App\Spend');
    }
}
