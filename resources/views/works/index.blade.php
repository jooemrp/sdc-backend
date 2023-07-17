@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <div class="mb-5 mx-5 flex justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl mt-5 mr-5 text-xl">
            <a href="../works/create"> Create New Post</a>
        </button>
        <input type="text" name="search" placeholder="Search Post" class="rounded-xl mt-5">
    </div>
    <div class="grid xl:grid-cols-3 gap-5 mx-5">
        @foreach ($posts as $post)
            <div class="border shadow-sma max-w-xl rounded-xl p-5">
                <h1 class="text-4xl font-bold mb-2">
                    <a href="">{{ $post->title }}</a>
                </h1>
                <p class="mb-5">{{ $post->category }}</p>
                <div class="flex">
                    <span class="text-blue-600 mr-5"><a href="/works/{{ $post->id }}/edit">edit</a></span>
                    <form action="/works/{{ $post->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="text-red-600">
                    </form>
                </div>
                {{-- <h2>The Challenge</h2> --}}
                {{-- <p>{{ $post->challenge }}</p> --}}
                {{-- <h2>Our Approach</h2> --}}
                {{-- <p>{{ $post->approach }}</p> --}}
                {{-- <h2>The Result</h2> --}}
                {{-- <p>{{ $post->result }}</p> --}}
            </div>
        @endforeach
    </div>
</div>
@endsection
