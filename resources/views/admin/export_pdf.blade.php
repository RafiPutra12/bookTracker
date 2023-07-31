<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book List</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>Book List</h1>
    <table class="table table-bordered">
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
                    <td align="center">{{ $index + 1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->copies_in_circulation }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
