<?php

namespace App\Http\Controllers;

use App\Spend;
use App\Part;

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
        'name' => 'required',
        'price' => 'required',
        'value' => 'required',
        ],
        [
        'required' => '・:attribute は必須項目です',
        ],
        [
        'name' => 'パーツ名',
        'price' => '価格',
        'value' => '内容量',
        ]);
        
        $spend = new Spend;
        $spend->genru = request('genru');
        $spend->name = request('name');
        $spend->price = request('price');
        $spend->value = request('value');
        $spend->unit = request('unit');
        $spend->shop = request('shop');
        $spend->other = request('other');
        $spend->save();
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
        'name' => 'required',
        'price' => 'required',
        'value' => 'required',
        ],
        [
        'required' => '・:attribute を入力してください',
        ],
        [
        'name' => 'パーツ名',
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
