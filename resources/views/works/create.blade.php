@include('layouts.header')
<div class="container">

    CREATE POST
    <form action="/works/save" method="POST">
        @csrf
        <h2>Title</h2>
        <input type="text" name="title" placeholder="Title"><br>
        <h2>Category</h2>
        <select name="category">
            <option value="">ChooseCategory</option>
            <option value="Content Creation">Content Creation</option>
            <option value="Paid Marketing">Paid Marketing</option>
            <option value="Content Marketing">Content Marketing</option>
        </select><br>
        <h2>The Challenge</h2>
        <textarea name="challenge" rows="10" placeholder="Challenge"></textarea><br>
        <h2>Our Approach</h2>
        <textarea name="approach" rows="10" placeholder="Approach"></textarea><br>
        <h2>The Result</h2>
        <textarea name="result" rows="10" placeholder="Result"></textarea><br>
        <input type="submit" name="submit" value="Save">
    </form>

</div>
@include('layouts.footer')
