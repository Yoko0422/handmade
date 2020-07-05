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
        
        return view('cost', ['parts' => $parts, 'genrus' => $genrus, 'login_user_id' => $login_user_id]);
    }

    
     public function store(Request $request){
        return redirect()->route('cost');
    } 
    
}
