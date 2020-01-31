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
        $tweet = new \App\Tweet;
        $tweet->author = $request->author;
        $tweet->content = $request->content;
        $tweet->save();

        $result = \App\Tweet::all();
        return view ('profile', ['tweets'=>$result]);

    }
    function deleteTweet(Request $request){
        \App\Tweet::destroy($request->id);
        $result = \App\Tweet::all();
        return view('profile', ['tweets' => $result]);
    }

    function showEditForm(Request $request){
        $result = \App\Tweet::find($request->id);
        return view('editform', ['tweets' => $result]);
    }
    function updateTweet(Request $request){
        $validateData = $request->validate(['content'=>'required|min:50']);
        // DB::update("UPDATE tweets SET author = '$request->author',content = '$request->content' WHERE id='$request->id'");
        $tweet = \App\Tweet::find($request->id);
        $tweet->author = $request->author;
        $tweet->content = $request->content;
        $tweet->save();
        $result = \App\Tweet::all();
        return view('profile', ['tweets' => $result]);
    }
    function showsingleTweet(Request $request) {
        $result = \App\Tweet::find($request->id);
        return view('tweet', ['tweets' => $result]);
    }


}
