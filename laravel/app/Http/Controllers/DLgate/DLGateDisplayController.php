<?php

namespace App\Http\Controllers\DLgate;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller\TwitterController;

use Illuminate\Http\Request;
use App\Dlgate_Table;

class DLGateDisplayController extends Controller
{
    public function DLGateForm(Request  $request){
        $request->session()->forget('Twitter_user_sucsess',
        'Twitter_tweet_sucsess','Twitter_user',
        'Twitter_tweet','dl_url','URL_id');
        
        $dlgate_table = Dlgate_Table::where('URL_id', $request["id"])->get();

            foreach($dlgate_table as $row){
                $request->session()->put('gate_name',$row->gate_name);
                $request->session()->put('dl_url',$row->dl_url);
                $request->session()->put('URL_id',$row->URL_id);

                if(empty($row->Twitter_user)){
                    //もしもtwitterのユーザー名を登録していない場合
                    session()->forget('Twitter_user');
                    $request->session()->put('Twitter_user_sucsess',true);
                }else{
                    $request->session()->put('Twitter_user',$row->Twitter_user);
                }

                //もしもtweetidをデータに挿入していない場合
                if(empty($row->Twitter_tweet)){
                    session()->forget('Twitter_tweet');
                    $request->session()->put('Twitter_tweet_sucsess',true);
                }else{
                    $request->session()->put('Twitter_tweet',$row->Twitter_tweet);
                }







            }

        if (empty($dlgate_table["0"])){
            \App::abort(404);
        }
        return view('DLgateForm');
    }
}
