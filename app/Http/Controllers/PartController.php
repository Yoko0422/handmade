<?php

namespace App\Http\Controllers;

use App\Part;
use App\Genru;
use App\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function parts(Request $request)
    {
            $parts = Part::all();
            $parts = Part::paginate(10);
            return view('parts', ['parts' => $parts]);
    }
    
     public function create()
    {
        $part = new Part;
        return view('part-new', ['part' => $part]);
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
        
        $part = new Part;
        $part->genru = request('genru');
        $part->name = request('name');
        $part->price = request('price');
        $part->value = request('value');
        $part->bit = number_format($part->price / $part->value, 2);
        $part->unit = request('unit');
        $part->shop = request('shop');
        $part->other = request('other');
        $part->save();
        $stock = new Stock;
        $stock->part_id = $part->id;
        $stock->stock = 0;
        $stock->save();
        return redirect()->route('parts.list');
    } 
    
    public function edit(Request $request){
      $part = Part::find($request->id);
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
        $part = Part::find($request->id);
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
    
     public function delete($id)
    {
      // 該当するNews Modelを取得
      $part = Part::find($id);
      // 削除する
      $part->delete();
      return redirect('/parts');
    }  

}
