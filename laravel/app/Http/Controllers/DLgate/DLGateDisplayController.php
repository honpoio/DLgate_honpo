<?php

namespace App\Http\Controllers\DLgate;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller\TwitterController;

use Illuminate\Http\Request;
use App\Dlgate_Table;

class DLGateDisplayController extends Controller
{
    public function DLGateForm(Request  $request){
        
        $request->session()->forget('Twitter_user','Twitter_tweet');
        $dlgate_table = Dlgate_Table::where('URL_id', $request["id"])->get();

            foreach($dlgate_table as $row){
                $request->session()->put('gate_name',$row->gate_name);

                $request->session()->put('Twitter_user',$row->Twitter_user);
                if(empty($request->session()->get('Twitter_user') )){
                    //もしもtwitterのユーザー名を登録していない場合
                    $request->session()->put('Twitter_user_sucsess',true);
                }
                $request->session()->put('Twitter_tweet',$row->Twitter_tweet);
                //もしもtweetidをデータに挿入していない場合
                if(empty($request->session()->get('Twitter_tweet') )){
                    $request->session()->put('Twitter_tweet_sucsess',true);
                }

                $request->session()->put('dl_url',$row->dl_url);
                $request->session()->put('URL_id',$row->URL_id);

            }

        if (empty($dlgate_table["0"])){
            \App::abort(404);
        }
        return view('DLgateForm');
    }
}
