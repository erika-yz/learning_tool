@extends('layouts.app')

@section('header')
    Manage Users
@endsection
@section('slot')
    <div class="items-center w-full px-4 py-4 mx-auto my-10 bg-white rounded-lg shadow-md sm:w-2/3">
        <div class="container mx-auto">
            <div class="mt-6 overflow-x-auto">
                <table class="w-full border border-collapse table-auto">
                    <thead class="">
                        <tr class="text-base font-bold text-left bg-gray-50">
                            <th class="px-4 py-3 border-b-2 border-blue-500">#</th>
                            <th class="px-4 py-3 border-b-2 border-green-500">Username</th>
                            <th class="px-4 py-3 border-b-2 border-red-500">Email</th>
                            <th class="px-4 py-3 text-center border-b-2 border-yellow-500 sm:text-left">Role</th>
                            <th class="px-4 py-3 text-center border-b-2 border-yellow-500 sm:text-left"></th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
                        <?php $i = 0; ?>
                        @foreach ($users as $key => $user)
                            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                <td class="flex flex-row items-center px-4 py-4">
                                    <div class="flex-1 pl-1">
                                        <div class="font-medium dark:text-black">{{ ++$i }}</div>
                                    </div>
                                </td>
                                <td class="px-4 py-4">
                                    {{ $user->username }}
                                </td>
                                <td class="px-4 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-4 py-4">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <div class="text-sm text-gray-900">{{ $v }}</div>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    <a href="{{ route('users.show',$user->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div
                class="flex flex-col items-center w-full px-4 py-2 space-y-2 text-sm text-gray-500 sm:justify-between sm:space-y-0 sm:flex-row">
                <p class="flex">Showing&nbsp;<span class="font-bold"> 1 to 4 </span>&nbsp;of 8 entries</p>
                <div class="flex items-center justify-between space-x-2">
                    <a href="#" class="hover:text-gray-600">Previous</a>
                    <div class="flex flex-row space-x-1">
                        <div class="flex px-2 py-px text-white bg-blue-400 border border-blue-400">1</div>
                        <div class="flex px-2 py-px border border-blue-400 hover:bg-blue-400 hover:text-white">2</div>
                    </div>
                    <a href="#" class="hover:text-gray-600">Next</a>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
