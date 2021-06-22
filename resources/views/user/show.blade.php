<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-8">
                        <ul>
                            <li><strong>Email</strong>: {{ $user->email }}</li>
                            <li><strong>Name</strong>: {{ $user->name }}</li>
                            <li><strong>Role</strong>: {{ $user->roles[0]->name }}</li>
                        </ul>

                    </div>


                    @can('edit users')
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                    @endcan
                    @can('list users')
                    <a href="{{ route('users.index') }}" class="btn btn-info"><- {{ __('Users') }}</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
