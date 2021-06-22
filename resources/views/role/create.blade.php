<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <form method="POST" action="{{ route('roles.store') }}">
                        {{ csrf_field() }}

                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="name">{{ __('Name') }}</label>
                            </div>
                            <div class="profile-input">
                                <input type="text" name="name" id="name" class="profile-text-input" required>
                            </div>
                        </div>

                        <div class="profile-grid">
                            <div class="profile-label">
                                {{ __('Permissions') }}
                            </div>
                            <div class="profile-input">

                                <div class="grid gap-4 grid-cols-2 md:grid-cols-3">

                                    @foreach($permissions as $permission)
                                        <div>
                                            <input type="checkbox" id="permission-{{ $permission->id }}" name="permissions[]" value="{{ $permission->name  }}">
                                            <label for="permission-{{ $permission->id }}">{{ $permission->name  }}</label>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 mb-3 text-center">
                            <div class="pr-2 pt-2">
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
