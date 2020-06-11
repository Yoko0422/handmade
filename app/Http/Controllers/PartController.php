<?php

namespace App\Http\Controllers;

use App\Part;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        'required' => '・:attribute を入力してください',
        ],
        [
        'name' => 'パーツ名',
        'price' => 'パーツ価格',
        'value' => 'パーツ内容量',
        ]);
        
        $part = new Part;
        $part->genru = request('genru');
        $part->name = request('name');
        $part->price = request('price');
        $part->value = request('value');
        $part->bit = $part->price / $part->value;
        $part->unit = request('unit');
        $part->shop = request('shop');
        $part->other = request('other');
        $part->save();
        return redirect()->route('parts.list');
    } 
    
    public function edit(Request $request){
      // News Modelからデータを取得する
      $part = Part::find($request->id);
    
      return view('parts', ['part_form' => $part]);
    }
    
    
    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, Part::$rules);
      // News Modelからデータを取得する
      $news = Part::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      unset($news_form['_token']);
    
      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();
    
      return redirect('/parts');
    }
    
     public function delete(Request $request)
    {
      // 該当するNews Modelを取得
      $part = Part::find($request->id);
      // 削除する
      $part->delete();
      return redirect('/parts');
    }  

}
