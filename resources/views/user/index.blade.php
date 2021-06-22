<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @can('create users')
                    <div class="mb-10">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">{{ __('Create new user') }}</a>
                    </div>
                    @endcan

                    <div>
                        <table class="w-full">
                            <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">{{ __('Name') }}</th>
                                <th class="text-left">{{ __('Email') }}</th>
                                <th class="text-left">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @can('show users')
                                        <a class="btn btn-link" href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                                        @else
                                        {{ $user->name }}
                                        @endcan
                                    </td>
                                    <td>
                                        @can('show users')
                                        <a class="btn btn-link" href="{{ route('users.show', $user) }}">{{ $user->email }}</a>
                                        @else
                                            {{ $user->email }}
                                        @endcan
                                        </td>
                                    <td>
                                        @can('edit users')
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                        @endcan

                                        @can('delete users')
                                        <form
                                            class="inline"
                                            action="{{ route('users.destroy', $user) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('Are your sure?') }}')"
                                        >
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                        @endcan
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
</x-app-layout>
