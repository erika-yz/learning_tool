@extends('layouts.app')

@section('header')
    User Information
@endsection
@section('slot')
    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full max-w-sm">
            <!--Role Name -->
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="username">
                        Role
                    </label>
                </div>
                <div class="md:w-2/3">
                    {!! Form::text('name', null, ['class' => 'bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500']) !!}

                </div>
            </div>
            <!--Permissions -->
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Permissions
                    </label>
                </div>

                <div class="md:w-2/3">
                    @foreach ($permission as $p)
                        <label>{{ Form::checkbox('permission[]', $p->id, in_array($p->id, $rolePermissions) ? true : false, ['class' => 'form-checkbox checked:bg-purple-900 hover:checked:bg-purple-500']) }}
                            {{ $p->name }}</label>
                        <br />
                    @endforeach

                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="Submit">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endSection
