@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    EDIT POST
    <form action="/works/{{ $posts->id }}" method="POST">
        @method('PUT')
        @csrf
        <h2>Title</h2>
        <input type="text" name="title" placeholder="Title" value="{{ $posts->title }}"><br>
        <h2>Category</h2>
        <select name="category">
            <option value="">ChooseCategory</option>
            <option value="Content Creation" @if ($posts->category == "Content Creation") selected @endif>Content Creation</option>
            <option value="Paid Marketing" @if ($posts->category == "Paid Marketing") selected @endif>Paid Marketing</option>
            <option value="Content Marketing" @if ($posts->category == "Content Marketing") selected @endif>Content Marketing</option>
        </select><br>
        <h2>The Challenge</h2>
        <textarea name="challenge" rows="20">{{ $posts->challenge }}</textarea><br>
        <h2>Our Approach</h2>
        <textarea name="approach" rows="20">{{ $posts->approach }}</textarea><br>
        <h2>The Result</h2>
        <textarea name="result" rows="20">{{ $posts->result }}</textarea><br>
        <input type="submit" name="submit" value="Update">
    </form>
</div>
@endsection
