<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->company }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->message }}</td>
            <td>{{ $item->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>