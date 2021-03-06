<?php

namespace App\Http\Controllers;

use App\Part;
use App\Spend;
use App\Genru;
use App\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartController extends Controller
{
    public function index(Request $request)
    {

    return view('index');
    }
    
    
    //パーツ一覧ページ
    public function parts(Request $request)
    {
        
        $stock = Stock::all();
        
        //ソート
        $sort = $request->sort;
        if (is_null($sort)) {
         $sort = 'id';
        }
        $parts = Part::orderBy($sort, 'asc')->simplePaginate(20);
        
        
        //自分が登録したパーツだけ表示するようにする
        $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
             
        return view('parts/parts', ['parts' => $parts, 'sort' => $sort, 'login_user_id' => $login_user_id]);
    }
    
    //パーツ情報登録ページ
     public function create()
    {
        $part = new Part;
       
       $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
       
        $array_genru = Genru::all()->pluck('name', 'id');
        
        $genrus = Genru::all();
        return view('parts/part-new', ['part' => $part, 'login_user_id' => $login_user_id, 'array_genru' => $array_genru, 'genrus' => $genrus]);
    }
    
    
    //パーツ情報記録
    public function store(Request $request){
        //バリデーション
        $request->validate([
        'genru' => 'required',
        'name' => 'required',
        'price' => 'required',
        'value' => 'required',
        ],
        [
        'required' => '・:attribute は必須項目です',
        ],
        [
        'genru' => '分類名',
        'name' => 'パーツ名',
        'price' => '価格',
        'value' => '内容量',
        'unit' => '単位',
        ]);
        
         $user = \Auth::user();
        
        $genru = Genru::where('name', request('genru'))->first();
        
        if(empty($genru)){
            $genru = new Genru;
            $genru->name = request('genru');
            $genru->user_id = $user->id;
            $genru->save();
        }
    
        $part = new Part;
        $part->name = request('name');
        $part->price = request('price');
        $part->value = request('value');
        $part->bit = $part->price / $part->value;
        $part->unit = request('unit');
        $part->shop = request('shop');
        $part->other = request('other');
        $part->genru_id = $genru->id;
        $part->user_id = $user->id;
        $part->save();
        $stock = new Stock;
        $stock->part_id = $part->id;
        $stock->stock = 0;
        $stock->save();
        return redirect()->route('parts.list');
    } 
    
    
    //パーツ情報編集ページ
    public function edit(Request $request){
      $part = Part::find($request->id);
      
      $genrus = Genru::all();
      
      $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
        
      return view('parts/part-edit', ['part' => $part, 'genrus' => $genrus, 'login_user_id' => $login_user_id]);
    }
    
    
    //パーツ編集情報記録
    public function update(Request $request)
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
        $genru = Genru::where('name', request('genru'))->first();
         if(empty($genru)){
            $genru = new Genru;
            $genru->name = request('genru');
            $genru->save();
         }
        $part = Part::find($request->id);
        $part->genru_id = $genru->id;
        $part->name = request('name');
        $part->price = request('price');
        $part->value = request('value');
        $part->bit = ceil($part->price / $part->value);
        $part->unit = request('unit');
        $part->shop = request('shop');
        $part->other = request('other');
        $part->save();
        return redirect()->route('parts.list', ['id' => $part->id]);
    }
    
    
    //パーツ情報削除
     public function delete(Request $request){
        $part = part::find($request->id);
        $part->delete();
        return redirect('parts');
        }
        


}