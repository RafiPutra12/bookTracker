<x-app-layout>
    @include('sweetalert::alert')
    @stack('scripts')
    <x-slot name="header">
        <div class="justify-between ml-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $pageTitle }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md float-right ml-1">ADD</a>
                <a href="{{ route('admin.exportExcel') }}" class="bg-green-500 text-white px-4 py-2 rounded-md float-right ml-3 btn btn-outline-dark btn-sm me-2">
                    <i class="bi bi-cloud-download-fill"></i> to Excel
                </a>
                <a href="{{ route('admin.exportPdf') }}" class="bg-red-500 text-white px-4 py-2 rounded-md float-right mb-3">
                    <i class="bi bi-cloud-download-fill"></i> to PDF
                </a>
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm" id="bookTable">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    No
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Title
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Author
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Release Year
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Released Copies
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Available Copies
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($books as $index => $book)
                                <tr>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $index+1 }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $book->title }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $book->author }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $book->year }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $book->copies_in_circulation }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $book->availableCopies() }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        <a href="{{ route('admin.show', $book->id) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-book-fill"></i>Show</a>
                                        <a href="{{ route('admin.edit', $book->id) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i>Edit</a>
                                        <form method="post" action="{{ route('admin.destroy', $book->id) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#bookTable').DataTable();
        });
    </script>
@endpush
</x-app-layout>
