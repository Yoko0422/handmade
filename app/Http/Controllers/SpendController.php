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
    //パーツ使用履歴一覧ページ
    public function spends()
    {
        $spends = Spend::all();
        $spends = Spend::paginate(20);
        
        $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
        
        return view('spends', ['spends' => $spends, 'login_user_id' => $login_user_id]);
    }
    
    //パーツ使用履歴フォーム画面
     public function create()
    {
        $spend = new Spend;
      
        //パーツ名プルダウン用
        $parts = Part::all();
        
        //分類プルダウン用
        $array_genrus = Genru::all();
        
        $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
        
        return view('spend-new', ['spend' => $spend, 'parts' => $parts, 'array_genrus' => $array_genrus, 'login_user_id' => $login_user_id]);
    }
    
    //パーツ使用履歴フォーム・データ記録
     public function store(Request $request){
        //バリデーション
        $request->validate([
        'date' => 'required',
        'which' => 'required',
        'genru_id' => 'required',
        'part_id' => 'required',
        'amount' => 'required'
        ],
        [
        'required' => '・:attribute は必須項目です',
        ],
        [
        'date' => '日付',
        'which' => '購入/消費',
        'genru_id' => '分類名',
        'part_id' => 'パーツ名',
        'amount' => '数量'
        ]);
        
        $user = \Auth::user();
        
        $spend = new Spend;
        $spend->date = request('date');
        $spend->amount = request('amount');
        $spend->which = request('which');
        $spend->price = request('price');
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
    
    public function edit(Request $request){
      $part = Spend::find($request->id);
      return view('part-edit', ['part' => $part]);
    }
    
    
     public function delete(Request $request)
         {
      $spend = Spend::find($request->id);
      
      //削除時の在庫数の調整
      $stock = Stock::where('part_id', $spend->part_id)->first();
        if($spend->which == "消費"){ $stock->stock += $spend->amount;}
        else{$stock->stock -= $spend->amount;}
      $stock->update();
      
      $spend->delete();
      
      return redirect('/spends');
    }  


}
