<?php

namespace Database\operateDB;
use Illuminate\Http\Request;
use App\Dlgate_Table;


class DLgate_Operation_DB
{

<<<<<<< HEAD
<<<<<<< HEAD
    public function select($id){
        //userの全てのレコードを表示
        $dlgate_table = Dlgate_Table::where('user_id', $id)->get();
        return view('DLgate',[ 'dlgate_table' => $dlgate_table]);
    }
    public function select_update($request,$id){
        //指定された1レコードを表示
<<<<<<< HEAD
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
=======
    public function select($id){
        $dlgate_table = Dlgate_Table::where('user_id', $id)->get();
>>>>>>> DB_redesign
        return view('DLgate',[ 'dlgate_table' => $dlgate_table]);
    }
    public function select_update($request,$id){
=======
>>>>>>> prepare_deploy
        $dlgate_table = Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('user_id', $id)->get();
        return view('DLgate_update',[ 'dlgate_table' => $dlgate_table]);
    }
    public function update($request,$id){
        //レコードを更新
        Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('user_id', $id)
        ->update([
<<<<<<< HEAD
            'Twitter_user' => trim(ltrim($request->Twitter_user,'https://twitter.com/')),
<<<<<<< HEAD
>>>>>>> test
=======
>>>>>>> frontend
=======
            'Twitter_user' => trim(str_replace('https://twitter.com/',NULL,$request->Twitter_user)),
>>>>>>> prepare_deploy
            'Twitter_tweet' => trim($request->tweet_id),
            'gate_name'=> trim($request->gate_name),
            'dl_url'=> trim($request->dl_url),
            ]);
<<<<<<< HEAD
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
=======
        return redirect('/DLgate')->with('status', __('更新に成功しました'));
>>>>>>> prepare_deploy
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
<<<<<<< HEAD
            'Twitter_user' => trim(ltrim($request->Twitter_user,'https://twitter.com/')),
<<<<<<< HEAD
>>>>>>> test
=======
>>>>>>> frontend
=======
            'Twitter_user' => trim(str_replace('https://twitter.com/',NULL,$request->Twitter_user)),
>>>>>>> prepare_deploy
            'Twitter_tweet' => trim($request->tweet_id),
            'gate_name'=> trim($request->gate_name),
            'dl_url'=> trim($request->dl_url),
            ]);
<<<<<<< HEAD
<<<<<<< HEAD
        return redirect('/DLgate')->with('status', __('新規作成に成功しました'));
=======
        return redirect('/DLgate');
>>>>>>> test
=======
        return redirect('/DLgate')->with('status', __('新規作成に成功しました'));
>>>>>>> prepare_deploy
    }
}