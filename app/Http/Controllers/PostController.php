<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);
        $links = Post::get();
        return view('posts.index', ['posts' => $posts, 'links' => $links]);
    }

    public function single($id)
    {
        try {
            $post = Post::findOrFail($id);
            $files = File::where('category', $post->title)->get();
            $links = Post::get();
            return view('posts.single', ["post" => $post, 'links' => $links, 'files' => $files]);
        } catch (ModelNotFoundException $err) {
            return redirect()->route('home');
        }
    }

    public function prestations()
    {
        $posts = Post::paginate(15);
        $links = Post::get();
        return view('prestations', ['posts' => $posts, 'links' => $links]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return back();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $links = Post::get();
        return view('posts.edit', ["id" => $id, "post" => $post, 'links' => $links]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->has('def')) {
            $post->def = $request->def;
        }
        if ($request->has('additionnal')) {
            $post->additionnal = $request->additionnal;
        }
        $post->save();

        return redirect()->route('posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
