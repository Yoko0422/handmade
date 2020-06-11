<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Part;
use App\Spend;

class SpendController extends Controller
{
    public function spends()
    {
        $spends = Spend::all();
        return view('spends', ['spends' => $spends]);
    }
    
     public function create()
    {
        $spend = new Spend;
        $parts = Part::all()->pluck('name', 'id');
        return view('spend-new', ['spend' => $spend, 'parts' => $parts]);
    }
    
     public function store(Request $request){
        $spend = new Spend;
        $spend->name = request('name');
        $spend->value = request('value');
        $spend->date = request('value');
        $spend->which = request('which');
        $spend->purpose = request('unit');
        $spend->other = request('other');
        $spend->save();
        return redirect()->route('spends.list',['id'=> $spend->id]);
    }
}
