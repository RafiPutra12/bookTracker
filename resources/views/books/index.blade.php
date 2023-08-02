<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<<<<<<< HEAD
=======

>>>>>>> Tugas-Dewa/main
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>{{ config('app.name', 'BookTracker') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
@stack('scripts')
=======
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

>>>>>>> Tugas-Dewa/main
<body class="font-sans antialiased">
    <div class="min-h-screen">
        @if (Route::has('login'))
            <div class="p-6 text-right">
                @auth
                    @include('layouts.navigation')
<<<<<<< HEAD
=======
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                    @endif
>>>>>>> Tugas-Dewa/main
                @endauth
            </div>
        @endif

<<<<<<< HEAD
        <h2 class="m-6 text-xl font-semibold text-gray-900 text-center">BookTracker</h2>

        <table class="mx-auto datatable" id="bookTable">
            <thead>
            <tr>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    #
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Title
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Author
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Release Year
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Released Copies
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Available Copies
                </th>
                @auth
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Actions
                    </th>
                @endif
            </tr>
            </thead>

            <tbody class="bg-white">
            @foreach($books as $book)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="text-sm font-medium leading-5 text-gray-900">
                                {{$book->title}}
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-500">{{$book->author}}</div>
                    </td>

                    <td
                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                        {{$book->year}}
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        @if($book->copies_in_circulation < 10)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                    {{$book->copies_in_circulation}}
                                </span>
                        @elseif($book->copies_in_circulation < 20)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                    {{$book->copies_in_circulation}}
                                </span>
                        @else
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    {{$book->copies_in_circulation}}
                                </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        @if($book->availableCopies() < 10)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                    {{$book->availableCopies()}}
                                </span>
                        @elseif($book->availableCopies() < 20)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                    {{$book->availableCopies()}}
                                </span>
                        @else
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    {{$book->availableCopies()}}
                                </span>
                        @endif
                    </td>
                    @auth
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                        @if($book->canBeBorrowed())
                            <a href="{{ route('loans.create', ['book' => $book->id]) }}">Borrow book</a>
                            @else
                            <p class="text-red-600"> No copies available to borrow</p>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#bookTable').DataTable();
        });
    </script>
@endpush
=======
        <h2 class="m-6 text-xl font-semibold text-gray-900 text-center">Laravel Library App</h2>
        <div class="input-group rounded text-center m-5">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <i class="bi bi-search"></i>
            </span>
        </div>

        <table class="mx-auto">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        #
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Title
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Author
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Release Year
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Released Copies
                    </th>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Available Copies
                    </th>
                    @auth
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Actions
                        </th>
                        @endif
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach ($books as $book)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $loop->index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                        {{ $book->title }}
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-500">{{ $book->author }}</div>
                            </td>

                            <td
                                class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                {{ $book->year }}
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($book->copies_in_circulation < 10)
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                        {{ $book->copies_in_circulation }}
                                    </span>
                                @elseif($book->copies_in_circulation < 20)
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                        {{ $book->copies_in_circulation }}
                                    </span>
                                @else
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                        {{ $book->copies_in_circulation }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($book->availableCopies() < 10)
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                        {{ $book->availableCopies() }}
                                    </span>
                                @elseif($book->availableCopies() < 20)
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                        {{ $book->availableCopies() }}
                                    </span>
                                @else
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                        {{ $book->availableCopies() }}
                                    </span>
                                @endif
                            </td>
                            @auth
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    @if ($book->canBeBorrowed())
                                        <a href="{{ route('loans.create', ['book' => $book->id]) }}">Borrow book</a>
                                    @else
                                        <p class="text-red-600"> No copies available to borrow</p>
                                    @endif
                                </td>
                        @endif
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </body>

        </html>
>>>>>>> Tugas-Dewa/main
