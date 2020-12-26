<?php

namespace Database\operateDB;
use Illuminate\Http\Request;
use App\Dlgate_Table;


class DLgate_Operation_DB
{

    public function select($id){
        $dlgate_table = Dlgate_Table::where('user_id', $id)->get();
        return view('DLgate',[ 'dlgate_table' => $dlgate_table]);
    }
    public function select_update($request,$id){
        $dlgate_table = Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('user_id', $id)->get();
        return view('DLgate_update',[ 'dlgate_table' => $dlgate_table]);
    }
    public function update($request,$id){
        Dlgate_Table::where('URL_id',$request->URL_id)
        ->where('user_id', $id)
        ->update([
            'Twitter_user' => trim(ltrim($request->Twitter_user,'https://twitter.com/')),
            'Twitter_tweet' => trim($request->tweet_id),
            'gate_name'=> trim($request->gate_name),
            'dl_url'=> trim($request->dl_url),
            ]);
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
            'Twitter_tweet' => trim($request->tweet_id),
            'gate_name'=> trim($request->gate_name),
            'dl_url'=> trim($request->dl_url),
            ]);
        return redirect('/DLgate');
    }
}