<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <form method="POST" action="{{ route('book.store') }}">
                        {{ csrf_field() }}

                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="name">{{ __('Tên sách: ') }}</label>
                            </div>
                            <div class="profile-input">
                                <input type="text" name="nameBook" id="nameBook" class="profile-text-input">
                            </div>
                        </div>

                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="name">{{ __('Tên tác giả: ') }}</label>
                            </div>
                            <div class="profile-input">
                                <input type="text" name="author" id="author" class="profile-text-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 mb-3 text-center">
                            <div class="pr-2 pt-2">
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                                <a href="{{ route('book.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
