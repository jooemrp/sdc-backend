<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\FileUploader;
use Illuminate\Http\Request;
use App\Models\Post;

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

    public function store(Request $request)
    {
        $input = $request->all();

        $post = Post::create([
            'title' => $input['title'],
            'category' => $input['category'],
            'challenge' => $input['challenge'],
            'approach' => $input['approach'],
            'result' => $input['result'],
        ]);

        if (!is_null($request->file('thumbnail'))) {
            FileUploader::upload($post, "Thumbnail", "thumbnail", 'store');
            $post->update(['img_url' => $post->getFirstMediaUrl('Thumbnail') ?? '']);
        }

        return redirect()->route('admin.works.index');
    }

    public function edit($id)
    {
        $data = Post::find($id);
        return view('admin.works.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $posts = Post::find($id);
        $posts->update($request->except(['_token', 'submit']));

        return redirect()->route('admin.works.index');
    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect()->route('admin.works.index');
    }
}
