<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public function spend(){
        return $this->belongTo('App\Spend');
    }
}
