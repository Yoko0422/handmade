<?php

namespace App\Http\Controllers;

use App\Part;
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
    
    public function parts(Request $request)
    {
        $parts = Part::all();
        $parts = Part::paginate(20);
        $stock = Stock::all();
        
        $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
             
        return view('parts', ['parts' => $parts, 'login_user_id' => $login_user_id]);
    }
    
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
        return view('part-new', ['part' => $part, 'login_user_id' => $login_user_id, 'array_genru' => $array_genru, 'genrus' => $genrus]);
    }
    
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
        'genru' => '分類',
        'name' => 'パーツ名',
        'price' => '価格',
        'value' => '内容量',
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
    
    public function edit(Request $request){
      $part = Part::find($request->id);
      $genrus = Genru::all();
      return view('part-edit', ['part' => $part, 'genrus' => $genrus]);
    }
    
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
        $part->bit = $part->price / $part->value;
        $part->unit = request('unit');
        $part->shop = request('shop');
        $part->other = request('other');
        $part->save();
        return redirect()->route('parts.list', ['id' => $part->id]);
    }
    

     public function delete(Request $request){
        $part = part::find($request->id);
        $part->delete();
        return redirect('parts');
        }
        
}