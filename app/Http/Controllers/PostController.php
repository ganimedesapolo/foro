<?php
namespace App\Http\Controllers;
use App\Post;
class PostController extends Controller
{


    public function show(Post $post, $slug)
    {
        if ($post->slug != $slug) {
            return redirect($post->url, 301);
        }
        return view('posts.show', compact('post'));
    }



    function  index(){
      $posts = Post::orderBy('created_at','DESC')->paginate();  
      //dd($posts->pluck('created_at')->toArray());	
      return view('posts.index',compact('posts'));
   }







}