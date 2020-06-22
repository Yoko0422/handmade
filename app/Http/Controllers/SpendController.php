<?php

namespace App\Http\Controllers;

use App\Spend;
use App\Part;
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
        $parts = Part::all()->pluck('name', 'id');
        return view('spend-new', ['spend' => $spend, 'parts' => $parts]);
    }
    
     public function store(Request $request){
        //バリデーション
        $request->validate([
        'amount' => 'required',
        ],
        [
        'required' => '・:attribute は必須項目です',
        ],
        [
        'amount' => '内容量',
        ]);
        
        $spend = new Spend;
        $spend->date = request('date');
        $spend->amount = request('amount');
        $spend->which = request('which');
        $spend->shop = request('shop');
        $spend->purpose = request('purpose');
        $spend->other = request('other');
        $spend->part_id = request('array_values(parts_id)');
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
        'price' => 'required',
        'value' => 'required',
        ],
        [
        'required' => '・:attribute を入力してください',
        ],
        [
        'price' => '価格',
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
