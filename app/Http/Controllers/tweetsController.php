<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class tweetsController extends Controller
{
    function show(){
        $result = \App\Tweet::all();
        return view ('profile', ['tweets'=>$result]);

    }
    function addTweet(Request $request){
        $validateInput = $request->validate(['content'=>'required|min:50']);
        // DB::insert("INSERT INTO tweets (author, content) VALUES ('$request->author','$request->content');");
        $tweet = new \App\Tweet;
        $tweet->author = $request->author;
        $tweet->content = $request->content;
        $tweet->save();

        $result = \App\Tweet::all();
        return view ('profile', ['tweets'=>$result]);

    }
    function deleteTweet(Request $request){
        DB::delete("DELETE FROM tweets WHERE id = '$request->id'");
        // \App\Tweet::destroy($id);
        // $tweet = \App\Tweet::find($id);
        // $tweet->delete();

        $result = \App\Tweet::all();
        return view('profile', ['tweets' => $result]);
    }

    function showEditForm(Request $request){
        $result = DB::select("SELECT * FROM tweets WHERE id='$request->id'");
        return view('editform', ['tweets' => $result]);
    }
    function updateTweet(Request $request){
        $validateData = $request->validate(['content'=>'required|min:50']);

        DB::update("UPDATE tweets SET author = '$request->author',content = '$request->content' WHERE id='$request->id'");
        $result = \App\Tweet::all();
        return view('profile', ['tweets' => $result]);
    }
    function showsingleTweet(Request $id) {
        $result = \App\Tweet::find($id);
        // $result = DB::select("SELECT * FROM tweets WHERE id='$request->id'");
        return view('tweet', ['tweets' => $result]);
    }


}
