<div class="container mt-5">
    <a href="../works/create"> Create New Post</a>
    @foreach ($posts as $post)
    <h1>
        <a href="">{{ $post->title }}</a></h1><p><a href="/works/{{ $post->id }}/edit">edit</a> - <a href="">delete</a></p>
    {{-- <p>{{ $post->category }}</p>
    <h2>The Challenge</h2>
    <p>{{ $post->challenge }}</p>
    <h2>Our Approach</h2>
    <p>{{ $post->approach }}</p>
    <h2>The Result</h2>
    <p>{{ $post->result }}</p> --}}
    @endforeach
</div>
