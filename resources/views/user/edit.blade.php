<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user') }}: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="email">{{ __('Email') }}</label>
                            </div>
                            <div class="profile-input">
                                <input type="email" name="email" id="email" value="{{ $user->email }}" disabled class="profile-text-input">
                            </div>
                        </div>

                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="name">{{ __('Name') }}</label>
                            </div>
                            <div class="profile-input">
                                <input type="text" name="name" id="name" value="{{ $user->name }}" class="profile-text-input">
                            </div>
                        </div>


                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="role">{{ __('Role') }}</label>
                            </div>
                            <div class="profile-input">
                                <select name="role" id="role" class="profile-text-input" @cannot('edit user_role') disabled @endcannot>
                                    <option>---------------------</option>
                                    @foreach($roles as $role)
                                        <option
                                            value="{{ $role->name }}"
                                            @if($user->hasRole($role->name)) selected @endif
                                        >
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="password">{{ __('Password') }}</label>
                            </div>
                            <div class="profile-input">
                                <input type="password" name="password" id="password" class="profile-text-input">
                            </div>
                        </div>

                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="password_confirmation">{{ __('Password Confirmation') }}</label>
                            </div>
                            <div class="profile-input">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="profile-text-input">
                            </div>
                        </div>


                        <div class="grid grid-cols-1 gap-4 mb-3 text-center">
                            <div class="pr-2 pt-2">
                                <button type="submit" class="btn btn-warning">{{ __('Update') }}</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
