<?php

namespace App\Http\Controllers\DLgate;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller\TwitterController;
use Illuminate\Http\Request;
use App\Dlgate;
use App\Http\Controllers\googleController;
use trunks07\YoutubeLaravelApi\AuthenticateService;


class DLGateDisplayController extends Controller
{
    public function DLGateForm(Request  $request){
        // dd($request->id);
        
        session()->forget(
            'DLgate_session',
            'Twitter_user',
            'Twitter_user_sucsess',
            'Twitter_tweet',
            'Twitter_tweet_sucsess',
            'youtube_channel_id',
            'youtube_channel_id_sucsess',
            'youtube_redirect');

            
        $Dlgate = Dlgate::where('URL_id', $request["id"])->get();

            foreach($Dlgate as $row){

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

                if(empty($row->youtube_channel_id)){
                    //もしもyoutube_channel_idを登録していない場合
                    session()->forget('youtube_channel_id');
                    session()->put('youtube_channel_id_sucsess',true);
                }else{
                    session()->put('youtube_channel_id',$row->youtube_channel_id);
                    $authObject  = new AuthenticateService;
                    session()->put('youtube_redirect',$authObject->getLoginUrl('email','identifier'));
                }
                

            }
        if (empty($Dlgate["0"])){
            \App::abort(404);
        }
        return view('DLgateForm');
    }
}
