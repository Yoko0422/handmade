<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Part;
use App\Spend;

class PartController extends Controller
{
   public function index()
    {
        return view('index');
    }
    
    public function parts()
    {
        $parts = Part::all();
        return view('parts', ['parts' => $parts]);
    }
    
    public function spends()
    {
        $spends = Spend::all();
        return view('spends', ['spends' => $spends]);
    }
    
     public function pcreate()
    {
        $part = new Part;
        $spends = Spend::all()->pluck('value', 'id');
        return view('part-new', ['part' => $part, 'spends' => $spends]);
    }
    
     public function screate()
    {
        $spend = new Spend;
        $parts = Part::all()->pluck('name', 'id');
        return view('spend-new', ['spend' => $spend, 'parts' => $parts]);
    }
    
    public function pstore(Request $request){
        $part = new Part;
        $part->name = request('name');
        $part->price = request('price');
        $part->value = request('value');
        $part->bit = number_format((request('price') / request('value')), 1);
        $part->unit = request('unit');
        $part->shop = request('shop');
        $part->other = request('pther');
        $part->save();
        return redirect()->route('parts.list',['id'=> $part->id]);
    }
}
