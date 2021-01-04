<?php

namespace App\Http\Controllers\DLgate;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller\TwitterController;

use Illuminate\Http\Request;
use App\Dlgate_Table;

class DLGateDisplayController extends Controller
{
    public function DLGateForm(Request  $request){

<<<<<<< HEAD
        session()->forget(
            'DLgate_session',
            'Twitter_user',
            'Twitter_user_sucsess',
            'Twitter_tweet',
            'Twitter_tweet_sucsess');


        $dlgate_table = Dlgate_Table::where('URL_id', $request["id"])->get();

            foreach($dlgate_table as $row){

                session()->put('DLgate_session',[
                    'gate_name' => $row->gate_name,
                    'dl_url' =>$row->dl_url,
                    'URL_id' =>$row->URL_id
                    ]);

                if(empty($row->Twitter_user)){
                    //もしもtwitterのユーザー名を登録していない場合
                    session()->forget('Twitter_user');
                    session()->put('Twitter_user_sucsess',true);
                }else{
                    session()->put('Twitter_user',$row->Twitter_user);
                }

                
                if(empty($row->Twitter_tweet)){
                    //もしもtweetidを登録していない場合
                    session()->forget('Twitter_tweet');
                    session()->put('Twitter_tweet_sucsess',true);
                }else{
                    session()->put('Twitter_tweet',$row->Twitter_tweet);
                }
            }
        if (empty($dlgate_table["0"])){
            \App::abort(404);
        }
        return view('DLgateForm');
=======
        $dlgate_table = Dlgate_Table::where('URL_id', $request["id"])->get();
        // app('Twitter_Operation')->AddGateProperty($dlgate_table);
        foreach($dlgate_table as $row){
            
            $request->session()->put('Twitter_user',$row->Twitter_user);
            
            if(is_null($request->session()->get('Twitter_user'))){
                //もしもtwitterのユーザー名を登録していない場合
                $request->session()->put('Twitter_user_sucsess',true);
            }

            
            $request->session()->put('Twitter_tweet',$row->Twitter_tweet);
            //もしもtweetidをデータに挿入していない場合
                if(is_null($request->session()->get('Twitter_tweet'))){
                    $request->session()->put('Twitter_tweet_sucsess',true);
                }

            $request->session()->put('URL_id',$row->URL_id);
        }


        if (empty($dlgate_table["0"])){
            \App::abort(404);
        }
        return view('DLgateForm',[ 'dlgate_table' => $dlgate_table]);
>>>>>>> test
    }
}
