@extends('layouts.app')

@section('header')
    Manage Roles
@endsection
@section('slot')
    <div class="items-center w-full px-4 py-4 mx-auto my-10 bg-white rounded-lg shadow-md sm:w-2/3">
        <div class="flex justify-end">
            <a class=" bg-green-900 text-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:border-white text-sm "
                href="{{ route('roles.create') }}">Create a new Role </a>
        </div>
        <div class="container mx-auto">
            <table class="w-ful table-auto">
                <thead class="">
                    <tr class="text-base font-bold text-left bg-gray-50">
                        <th class="px-4 py-3 border-b-2 ">#</th>
                        <th class="px-4 py-3 border-b-2 ">Role Name</th>
                        <th class="px-4 py-3 text-center border-b-2 sm:text-left"></th>
                    </tr>
                </thead>
                <tbody class="text-sm font-normal text-gray-700">
                    @foreach ($roles as $key => $role)
                        <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                            <td class="flex flex-row items-center px-4 py-4">
                                <div class="flex-1 pl-1">
                                    <div class="font-medium dark:text-black">{{ ++$i }}</div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                {{ $role->name }}
                            </td>
                            <td class="px-4 py-4">
                                <div x-data="{ show: false }" @click.away="show = false" class="mb-2">
                                    <button @click="show = ! show" type="button"
                                        class="flex bg-purple-900 text-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:border-white text-sm">
                                        <span class="pr-2">Options</span>
                                        <svg class="fill-current text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                            height="24" viewBox="0 0 20 20" width="19">
                                            <path d="M7 10l5 5 5-5z" />
                                            <path d="M0 0h24v24H0z" fill="none" />
                                        </svg>
                                    </button>
                                    <div x-show="show" class="absolute bg-gray-100 z-10 shadow-md" style="min-width:10rem">
                                        {{-- show --}}
                                        <a class="block px-3 py-2 hover:bg-violet-200"
                                            href="{{ route('roles.show', $role->id) }}">Show</a>

                                        {{-- Edit --}}
                                        <a class="block px-3 py-2 hover:bg-violet-200"
                                            href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                        {{-- Delete --}}
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id]]) !!}
                                        {!! Form::submit('Delete', ['class' => 'block px-3 py-2 hover:bg-violet-200']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
    {!! $roles->render() !!}
@endsection
