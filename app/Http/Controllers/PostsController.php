<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index ()
    {
        $bloqs = Post::all();

        return view('show',compact('bloqs'));
}

    public function create ()
    {
       //$bloqs = Post::all();
        //dd($bloqs);

        return view('create');
    }

    public function store ()
    {
        $this->validate(request(),[
            'title' => 'required',
            'body'=>'required'
        ]);

        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        //dd($post->title);
        $post->save();
        return redirect('bloq/show');
        //dd(request('title'));
    }

    public function delete($id)
    {
        dd('ok');
        Post::findOrFail($id)->delete();
        return redirect('bloq/show');
    }


}
