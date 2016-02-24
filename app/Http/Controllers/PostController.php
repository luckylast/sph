<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use App\User;
    
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::find($request->get('post_id'));
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        if($post->save()){
            return redirect('edit/'.$post->slug);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getShow($slug)
    {
        $post = Post::where('slug','=',$slug)->firstOrFail();
        $out['title'] = $post->title;
        $out['author_id'] = $post->author_id;
        $out['body'] = $post->body;
        $out['slug'] = $post->slug;
        $out['id'] = $post->id;
        //get coments
        $comments = Comment::where('on_post',$post->id)->orderby('id','desc')->get();
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
            return view('posts.show', $out);
        }else{
            return view('posts.show', $out);
        }        
    }
    public function newPost(){
        return view('posts.new');
    }
    public function createPost(Request $request){
        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = str_slug($post->title);
        $post->active = 1;
        $post->author_id = $request->user()->id;
        if($post->save()){
            $alert="Post published successfully.";
        }else{
            $alert="Post published unsuccessfully.";
        }
        $out['post_id'] = $post->id;
        $out['title'] = $post->title;
        $out['body'] = $post->body;
        $out['author_id'] = $post->author_id;
        $out['alert'] = $alert;

        return redirect('edit/'.$post->slug);
    }
    public function comment(Request $request){
        
    }
}
