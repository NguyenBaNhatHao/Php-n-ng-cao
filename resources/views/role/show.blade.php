<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $role->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h2 class="text-blue-700">{{ __('Role') }}: {{ $role->name }}</h2>
                    <ul class="mb-3">
                        @foreach($role->permissions as $permission)
                            <li class="pl-3">{{ $permission->name }}</li>
                        @endforeach
                    </ul>

                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-info"><- {{ __('Roles') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
