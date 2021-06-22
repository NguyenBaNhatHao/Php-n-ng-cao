<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-10">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary">{{ __('Create new role') }}</a>
                    </div>

                    <div>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left">#</th>
                                    <th class="text-left">{{ __('Role') }}</th>
                                    <th class="text-left">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a class="btn btn-link" href="{{ route('roles.show', $role) }}">{{ $role->name }}</a></td>
                                        <td>
                                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">{{ __('Edit') }}</a>

                                            <form
                                                class="inline"
                                                action="{{ route('roles.destroy', $role) }}"
                                                method="POST"
                                                onsubmit="return confirm('{{ __('Are your sure?') }}')"
                                            >
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
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
</x-app-layout>
