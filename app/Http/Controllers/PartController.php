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
}
