@extends('layouts.app')
@section('content')
<div class="flex justify-center">
   <h1 class="text-2xl font-bold my-5"> CREATE POST</h1>
</div>
<div class="mx-auto w-2/4">
    <form action="/works/save" method="POST" class="grid grid-cols-1 mb-5">
        @csrf
        <h2 class="text-2xl font-semibold my-5">Title</h2>
        <input type="text" name="title" placeholder="Title"><br>
        <h2 class="text-2xl font-semibold my-5">Category</h2>
        <select name="category">
            <option value="">ChooseCategory</option>
            <option value="Content Creation">Content Creation</option>
            <option value="Paid Marketing">Paid Marketing</option>
            <option value="Content Marketing">Content Marketing</option>
        </select><br>
        <h2 class="text-2xl font-semibold my-5">The Challenge</h2>
        <textarea name="challenge" rows="10" placeholder="Challenge"></textarea><br>
        <h2 class="text-2xl font-semibold my-5">Our Approach</h2>
        <textarea name="approach" rows="10" placeholder="Approach"></textarea><br>
        <h2 class="text-2xl font-semibold my-5">The Result</h2>
        <textarea name="result" rows="10" placeholder="Result"></textarea><br>
        <button class="mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-1/5 rounded-xl text-xl pb">
            <input type="submit" name="submit" value="Save">
        </button>
    </form>

</div>
@endsection

