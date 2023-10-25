<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.works.index', compact(['posts']));
    }

    public function create()
    {
        return view('admin.works.create');
    }

    public function save(Request $request)
    {
        // dd($request->except(['_token','submit']));
        Post::create($request->except(['_token', 'submit']));
        return redirect('/works');
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        return view('admin.works.edit', compact(['posts']));
    }

    public function update($id, Request $request)
    {
        $posts = Post::find($id);
        $posts->update($request->except(['_token', 'submit']));
        return redirect('/works');
    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect('/works');
    }
}
