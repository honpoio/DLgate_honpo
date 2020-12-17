<?php

namespace App\Http\Controllers\DLgate;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller\TwitterController;

use Illuminate\Http\Request;
use App\Dlgate_Table;

class DLGateDisplayController extends Controller
{
    public function DLGateForm(Request  $request){

        $dlgate_table = Dlgate_Table::where('URL_id', $request["id"])->get();
        // app('Twitter_Operation')->AddGateProperty($dlgate_table);
        foreach($dlgate_table as $row){
            
            $request->session()->put('Twitter_user',$row->Twitter_user);
            
            if(is_null($request->session()->get('Twitter_user'))){
                $screen_name = $request->session()->get('Twitter_user_sucsess',true);
            }

            
            $request->session()->put('Twitter_tweet',$row->Twitter_tweet);
                if(is_null($request->session()->get('Twitter_tweet'))){
                    $request->session()->put('Twitter_tweet_sucsess',true);
                }

            $request->session()->put('URL_id',$row->URL_id);
        }
        // $twitter = new TwitterController();
        // $twitter::AddGateProperty($dlgate_table);

        if (empty($dlgate_table["0"])){
            \App::abort(404);
        }
        return view('DLgateForm',[ 'dlgate_table' => $dlgate_table]);
    }
}
