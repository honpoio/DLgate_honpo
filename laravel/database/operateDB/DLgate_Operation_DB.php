<?php

namespace Database\operateDB;
use Illuminate\Http\Request;
use App\Dlgate_Table;


class DLgate_Operation_DB
{

<<<<<<< HEAD
    public function select($id){
        //userの全てのレコードを表示
        $dlgate_table = Dlgate_Table::where('user_id', $id)->get();
        return view('DLgate',[ 'dlgate_table' => $dlgate_table]);
    }
    public function select_update($request,$id){
        //指定された1レコードを表示
        $dlgate_table = Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('user_id', $id)->get();
        return view('DLgate_update',[ 'dlgate_table' => $dlgate_table]);
    }
    public function update($request,$id){
        //レコードを更新
        Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('user_id', $id)
        ->update([
            'Twitter_user' => trim(str_replace('https://twitter.com/',NULL,$request->Twitter_user)),
=======
    public function select($user){
        $dlgate_table = Dlgate_Table::where('name', $user["name"])->get();
        return view('DLgate',[ 'dlgate_table' => $dlgate_table]);
    }
    public function select_update($request,$user){
        $dlgate_table = Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('name',$user["name"])->get();
        return view('DLgate_update',[ 'dlgate_table' => $dlgate_table]);
    }
    public function update($request,$user){
        Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('name',$user["name"])
        ->update([
            'Twitter_user' => trim(ltrim($request->Twitter_user,'https://twitter.com/')),
>>>>>>> test
            'Twitter_tweet' => trim($request->tweet_id),
            'gate_name'=> trim($request->gate_name),
            'dl_url'=> trim($request->dl_url),
            ]);
<<<<<<< HEAD
        return redirect('/DLgate')->with('status', __('更新に成功しました'));
    }
    public function delete($request,$id){
        //レコードを削除
        Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('user_id', $id)
        ->delete();
        return redirect('/DLgate')->with('status', __('削除に成功しました'));
    }
    public function create($request,$id){
        //レコードを新規作成
        Dlgate_Table::create([
            'user_id' => $id,
            'URL_id' => uniqid(),
            'Twitter_user' => trim(str_replace('https://twitter.com/',NULL,$request->Twitter_user)),
=======
        return redirect('/DLgate');
    }
    public function delete($request,$user){
        Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('name',$user["name"])
        ->delete();
        return redirect('/DLgate');
    }
    public function create($request,$user){
        Dlgate_Table::create([
            'name' => $user["name"],
            'URL_id' => uniqid(),
            'Twitter_user' => trim(ltrim($request->Twitter_user,'https://twitter.com/')),
>>>>>>> test
            'Twitter_tweet' => trim($request->tweet_id),
            'gate_name'=> trim($request->gate_name),
            'dl_url'=> trim($request->dl_url),
            ]);
<<<<<<< HEAD
        return redirect('/DLgate')->with('status', __('新規作成に成功しました'));
=======
        return redirect('/DLgate');
>>>>>>> test
    }
}