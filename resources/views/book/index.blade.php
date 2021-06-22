<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quản Lí Sách') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-10">
                        <a href="{{ route('book.create') }}" class="btn btn-primary">{{ __('Create new book') }}</a>
                    </div>
                        <div>
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left">{{ __('Tên sách') }}</th>
                                        <th class="text-left">{{ __('Tên tác giả và nhà sản xuất') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($current_books as $book)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a class="">{{ $book->nameBook }}</a></td>
                                            <td>
                                                <a href="{{ route('book.edit', $book) }}" class="btn btn-warning">{{ __('Edit') }}</a>

                                                <form
                                                    class="inline"
                                                    {{-- action="{{ route('book.delete', $book) }}" --}}
                                                    method="POST"
                                                    onsubmit="return confirm('{{ __('Are your sure?') }}')"
                                                >
                                                    {!! csrf_field() !!}

                                                    {{-- <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button> --}}
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
        </div>
    </div>
</x-app-layout>
