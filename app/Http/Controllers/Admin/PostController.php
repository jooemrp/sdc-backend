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
            'slug' => $input['slug'],
            'category' => $input['category'],
            'color' => $input['color'],
            'preview' => $input['preview'],
            'challenge' => $input['challenge'],
            'approach' => $input['approach'],
            'result' => $input['result'],
            'meta_title' => $input['meta_title'],
            'meta_description' => $input['meta_description'],
        ]);

        if (!is_null($request->file('thumbnail'))) {
            FileUploader::upload($post, "Work_thumbnail", "thumbnail", 'store');
            $post->update(['img_url' => $post->getFirstMediaUrl('Work_thumbnail') ?? '']);
        }

        if (!is_null($request->file('content'))) {
            if (!is_array($request->file('content'))) {
                FileUploader::upload($post, "Work_content", 'content', 'store');
            } else {
                FileUploader::uploadMultiple($post, "Work_content", ['content'], 'store');
            }
        }

        return redirect()->route('admin.works.index');
    }

    public function edit($id)
    {
        $data = Post::find($id);
        return view('admin.works.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $post = Post::find($id);

        $post->update([
            'title' => $input['title'],
            'slug' => $input['slug'],
            'category' => $input['category'],
            'color' => $input['color'],
            'preview' => $input['preview'],
            'challenge' => $input['challenge'],
            'approach' => $input['approach'],
            'result' => $input['result'],
            'meta_title' => $input['meta_title'],
            'meta_description' => $input['meta_description'],
        ]);

        if (!is_null($request->file('thumbnail'))) {
            FileUploader::upload($post, "Work_thumbnail", "thumbnail", 'update');
            $post->update(['img_url' => $post->getFirstMediaUrl('Work_thumbnail') ?? '']);
        }

        if (!is_null($request->file('content'))) {
            if (!is_array($request->file('content'))) {
                FileUploader::upload($post, "Work_content", 'content', 'store');
            } else {
                FileUploader::uploadMultiple($post, "Work_content", ['content'], 'store');
            }
        }

        return redirect()->route('admin.works.index');
    }

    public function show($id)
    {
        $data = Post::find($id);
        return view('admin.works.edit', compact('data'));
    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect()->route('admin.works.index');
    }

    public function removeMedia($id, $mediaKey)
    {
        $posts = Post::find($id);

        $del = $posts->getMedia('Work_content')[$mediaKey]->delete();

        return redirect()->back();
    }
}
