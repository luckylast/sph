<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;

class CommentController extends Controller
{
    public function save(Request $request){
    	
    	$comment = new Comment;
    	$comment->on_post = $request->input('post_id');
    	$comment->from_user = $request->user()->id;
    	$comment->body = $request->input('post_body');
    	if($comment->save()){
    		$comments = Comment::where('on_post',$comment->on_post)->orderby('id','desc')->get();
    		if(count($comments)){
    			foreach($comments as $key => $comment){
    				$user = User::find($comment->from_user);
    				$out['comments'][$key] =[
    					'post_id' => $comment->post_id,
    					'from_user' => $user->name,
    					'body' => $comment->body,
    					'created_at'=>$comment->created_at,
    				];
    			}
    			//return $out;
    			return view('posts.comment', $out);
    		}    		
    	}else{
    		return '0';
    	}
    }
}
