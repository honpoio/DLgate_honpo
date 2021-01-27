<?php

namespace Database\operateDB;
use Illuminate\Http\Request;
use App\Dlgate;


class DLgateOperationDB
{

    public function Select($id){
        //userの全てのレコードを表示
        $dlgate_table = Dlgate::where('user_id', $id)->get();
        return view('DLgate',[ 'dlgate_table' => $dlgate_table]);
    }
    public function SelectUpdate($request,$id){
        //指定された1レコードを表示
        $dlgate_table = Dlgate::where('URL_id',$request->URL_id)
        ->where('user_id', $id)->get();
        return view('DLgate_update',[ 'dlgate_table' => $dlgate_table]);
    }
    public function Update($request,$id){
        //レコードを更新
        Dlgate::where('URL_id',$request->URL_id)
        ->where('user_id', $id)
        ->update([
            'Twitter_user' => trim(str_replace('https://twitter.com/',NULL,$request->Twitter_user)),
            'Twitter_tweet' => trim($request->tweet_id),
            'gate_name'=> trim($request->gate_name),
            'dl_url'=> trim($request->dl_url),
            'youtube_channel_id'=> trim($request->youtube_channel_id),
            ]);
        return redirect('/DLgate')->with('status', __('更新に成功しました'));
    }
    public function Delete($request,$id){
        //レコードを削除
        Dlgate::where('URL_id',$request->URL_id)
        ->where('user_id', $id)
        ->delete();
        return redirect('/DLgate')->with('status', __('削除に成功しました'));
    }
    public function Create($request,$id){
        //レコードを新規作成
        Dlgate::create([
            'user_id' => $id,
            'URL_id' => uniqid(),
            'Twitter_user' => trim(str_replace('https://twitter.com/',NULL,$request->Twitter_user)),
            'Twitter_tweet' => trim($request->tweet_id),
            'gate_name'=> trim($request->gate_name),
            'dl_url'=> trim($request->dl_url),
            'youtube_channel_id'=> trim($request->youtube_channel_id),
            ]);
            
        return redirect('/DLgate')->with('status', __('新規作成に成功しました'));
    }
}