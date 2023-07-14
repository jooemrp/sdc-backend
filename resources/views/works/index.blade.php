@extends('layouts.app')
@section('content')
<div>
    <div>
        <a href="../works/create"> Create New Post</a>
        @foreach ($posts as $post)
        <h1 class="text-4xl font-bold">
            <a href="">{{ $post->title }}</a></h1><p><a href="/works/{{ $post->id }}/edit">edit</a></p>
                <form action="/works/{{ $post->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete">
                </form>
        <p>{{ $post->category }}</p>
        <h2>The Challenge</h2>
        <p>{{ $post->challenge }}</p>
        <h2>Our Approach</h2>
        <p>{{ $post->approach }}</p>
        <h2>The Result</h2>
        <p>{{ $post->result }}</p>
        @endforeach
    </div>
</div>
@endsection
