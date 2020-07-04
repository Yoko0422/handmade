<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenkaController extends Controller
{
    //パーツ使用履歴フォーム画面
     public function index()
    {
       
        //パーツ名プルダウン用
        $parts = Part::all();
        
        //分類プルダウン用
        $array_genru = Genru::all()->pluck('name', 'id');
        return view('genka', ['spend' => $spend, 'parts' => $parts, 'array_genru' => $array_genru]);
    }

    
     public function store(Request $request){
        //バリデーション
        $request->validate([
        'date' => 'required',
        'which' => 'required',
        'amount' => 'required'
        ],
        [
        'required' => '・:attribute は必須項目です',
        ],
        [
        'date' => '日付',
        'which' => '購入/消費',
        'amount' => '個数',
        ]);
        
       
        $spend = new Spend;
        $spend->date = request('date');
        $spend->amount = request('amount');
        $spend->which = request('which');
        $spend->shop = request('shop');
        $spend->purpose = request('purpose');
        $spend->other = request('other');
        $spend->part_id = request('part_id');
        $spend->genru_id = request('genru_id');
        $spend->user_id = $user->id;
        $spend->save();
        
        $stock = Stock::where('part_id', $spend->part_id)->first();
        if($spend->which == "購入"){ $stock->stock += $spend->amount;}
        else{$stock->stock -= $spend->amount;}
        $stock->update();
        return redirect()->route('spends.list');
    } 
    
}
