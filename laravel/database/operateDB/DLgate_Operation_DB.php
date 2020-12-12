<?php

namespace Database\operateDB;
use Illuminate\Http\Request;
use App\Dlgate_Table;


class DLgate_Operation_DB
{

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
            'Twitter_user' => $request->Twitter_user,
            'Twitter_tweet' => $request->tweet_id,
            'gate_name'=> $request->gate_name,
            'dl_url'=> $request->dl_url,
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
            'Twitter_user' => $request->Twitter_user,
            'Twitter_tweet' => $request->tweet_id,
            'gate_name'=> $request->gate_name,
            'dl_url'=> $request->dl_url,
            ]);
        return redirect('/DLgate');
    }
}