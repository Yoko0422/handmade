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
    
     public function create()
    {
        $part = new Part;
        $spends = Spend::all()->pluck('value', 'id');
        return view('part-new', ['part' => $part, 'spends' => $spends]);
    }
    
    public function store(Request $request){
        $part = new Part;
        $part->name = request('name');
        $part->price = request('price');
        $part->value = request('value');
        $part->unit = request('unit');
        $part->shop = request('shop');
        $part->other = request('other');
        $part->save();
        return redirect()->route('parts.list',['id'=> $part->id]);
    }
    
    public function edit($id){
        $part = Part::find($id);
        $spends = Spend::all()->plunk('name', 'id');
        return view('edit', ['part' => $part, 'spends => $spends']);
    }
}
