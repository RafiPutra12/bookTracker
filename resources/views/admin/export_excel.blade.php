<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Release Year</th>
            <th>Released Copies</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $index => $book)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->copies_in_circulation }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
