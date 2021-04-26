<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\File;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::get();
        $files = File::where('category', 'about')->get();
        $links = Post::get();
        return view('about',['links'=>$links, 'files'=>$files, 'about'=>$about]);
    }

    public function edit($id)
    {
        $about = About::find($id);
        $links = Post::get();
        return view('about.edit', ["id" => $id, "about" => $about, 'links' => $links]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'body'  =>  'required',
        ]);

        $about = About::find($id);
        $about->body = $request->body;
        $about->save();
        return redirect()->route('about');
    }
}
