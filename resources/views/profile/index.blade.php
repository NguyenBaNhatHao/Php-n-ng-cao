<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('update-profile') }}">
                        {{ csrf_field() }}

                        <div class="profile-grid grid grid-cols-3">
                            <div class="profile-label">
                                <label for="email">{{ __('Email') }}</label>
                            </div>
                            <div class="profile-input col-span-3">
                                <input type="email" name="email" id="email" value="{{ $current_user->email }}" disabled class="profile-text-input">
                            </div>
                        </div>

                        <div class="profile-grid">
                            <div class="profile-label">
                                <label for="name">{{ __('Name') }}</label>
                            </div>
                            <div class="profile-input">
                                <input type="text" name="name" id="name" value="{{ $current_user->name }}" class="profile-text-input">
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
                                <button type="submit" class="primary-button hover-btn bg-blue-500 active:bg-blue-700 py-2 px-4 font-semibold rounded-lg text-black">{{ __('Update') }}</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
