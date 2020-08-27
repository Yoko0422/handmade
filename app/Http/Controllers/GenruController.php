<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genru;
use App\Part;
use App\Spend;

class GenruController extends Controller
{
   public function genrus(Request $request)
    {
        $genrus = Genru::all();
        
        $user = \Auth::user();
        if($user){
            $login_user_id = $user->id;
        }else{
            $login_user_id = "";
        }
             
        return view('genrus', ['genrus' => $genrus, 'login_user_id' => $login_user_id]);
    }
  
   public function edit(Request $request){
      $genru = Genru::find($request->id);
      return view('genru-edit', ['genru' => $genru]);
    }
    
    public function update(Request $request)
    {
      // 該当するデータを上書きして保存する
        $genru = Genru::find($request->id);
        $genru->id = $genru->id;
        $genru->name = request('name');
        $genru->save();
        return redirect()->route('genrus.list', ['id' => $genru->id]);
    }
    
     public function delete(Request $request){
        $genru = Genru::find($request->id);
        $genru->delete();
        $part = Part::where('genru_id', '=', $request->id);
        $part->delete();
        $spend = Spend::where('genru_id','=',  $request->id);
        $spend->delete();
        return redirect('genrus');
        }
    
    
}