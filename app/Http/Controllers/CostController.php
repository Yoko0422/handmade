<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Spend;
use App\Part;
use App\Genru;

use Illuminate\Http\Request;

class CostController extends Controller
{
    //パーツ使用履歴フォーム画面
      public function index()
    {
        //パーツ名プルダウン用
        $parts = Part::all();
        
        //分類プルダウン用
        $genrus = Genru::all();
        
        $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
        
        $count = request('form_count') - 1;
    
        return view('cost', ['parts' => $parts, 'genrus' => $genrus, 'login_user_id' => $login_user_id, 'sum' => array(), 'count' => $count]);
    }


     public function calc(Request $request){
         
         $count = request('form2');
         
         for($i=0; $i <= $count; $i++){
           $g_id = intval(request('genru_name'.$i));
           if($g_id != null){
            //分類名
            $genru = Genru::find($g_id);
            $gname[$i] = $genru->name;
           }
            
             $p_id = intval(request('part_name'.$i));
           if($p_id != null){
            //個数
            $amount = request('amount'.$i);
            $part = Part::find($p_id);
            //原価
            $sum[$i] = $amount * $part->bit;
            //パーツ名
            $name[$i] = $part->name;
            //単価
            $unit[$i] = $part->unit;
           }
         }
         
        //分類プルダウン用
        $genrus = Genru::all();
        
        //パーツ名プルダウン用
        $parts = Part::all();
        
        $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
        
        return view('cost', ['count' => $count, 'sum' => $sum, 
                    'g_id' => $g_id, 'genru' => $genru, 'gname' => $gname,
                    'p_id' => $p_id, 'amount' => $amount, 'part' => $part, 'name' => $name, 'unit' => $unit,
                    'parts' => $parts, 'genrus' => $genrus, 'login_user_id' => $login_user_id]);
    } 
    
}
