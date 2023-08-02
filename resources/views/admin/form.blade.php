<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($book) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="POST" action="{{ isset($book) ? route('admin.update', $book->id) : route('admin.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($book)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$book->title ?? old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div>
                            <x-input-label for="author" value="author" />
                            <x-text-input id="author" name="author" type="text" class="mt-1 block w-full" :value="$book->author ?? old('author')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('author')" />
                        </div>
                        <div>
                            <x-input-label for="year" value="year" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$book->year ?? old('year')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('year')" />
                        </div>
                        <div>
                            <x-input-label for="copies" value="copies" />
                            <x-text-input id="copies" name="copies" type="text" class="mt-1 block w-full" :value="$book->copies_in_circulation ?? old('copies')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('copies')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
