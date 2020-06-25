<?php

namespace App\Http\Controllers;

use App\Spend;
use App\Part;
use App\Genru;
use App\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpendController extends Controller
{
    public function spends()
    {
        $spends = Spend::all();
        $spends = Spend::paginate(20);
        return view('spends', ['spends' => $spends]);
    }
    
     public function create()
    {
        $spend = new Spend;
        $array_part = Part::all()->pluck('name', 'id');
        $part = Part::all();
        $array_genru = Genru::all()->pluck('name', 'id');
        $genrus = Genru::all();
        return view('spend-new', ['spend' => $spend, 'array_part' => $array_part, 'part' => $part, 'array_genru' => $array_genru, 'genrus' => $genrus]);
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
        
        $genru = Genru::where('name', request('genru'))->first();
        $spend = new Spend;
        $spend->date = request('date');
        $spend->amount = request('amount');
        $spend->which = request('which');
        $spend->shop = request('shop');
        $spend->purpose = request('purpose');
        $spend->other = request('other');
        $spend->part_id = request('array_values(part_id)');
        $spend->genru_id = request('array_values(genru_id)');
        $spend->save();
        $stock = Stock::where('part_id', $spend->part_id)->first();
        if($spend->which == "購入"){ $stock->stock += $spend->amount;}
        else{$stock->stock -= $spend->amount;}
        $stock->update();
        return redirect()->route('spends.list');
    } 
    
    
    
    public function edit(Request $request, $id){
      $part = Spend::find($request->id);
      return view('part-edit', ['part' => $part]);
    }
    
    
    public function update(Request $request, $id, Part $part)
    {
     //バリデーション
        $request->validate([
        'which' => 'required',
        'value' => 'required',
        ],
        [
        'required' => '・:attribute を入力してください',
        ],
        [
        'price' => '購入/消費',
        'value' => '内容量',
        ]);
    
      // 該当するデータを上書きして保存する
        $part = Spend::find($request->id);
        $part->genru = request('genru');
        $part->name = request('name');
        $part->price = request('price');
        $part->value = request('value');
        $part->bit = $part->price / $part->value;
        $part->unit = request('unit');
        $part->shop = request('shop');
        $part->other = request('other');
        $part->save();
        return redirect()->route('parts.list', ['id' => $part->id]);
    }
    
     public function delete(Request $request)
    {
      // 該当するSpend Modelを取得
      $spend = Spend::find($request->id);
      // 削除する
      $spend->delete();
      return redirect('/spends');
    }  

}
