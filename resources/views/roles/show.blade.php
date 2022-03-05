@extends('layouts.app')

@section('header')
    Role Information
@endsection
@section('slot')
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
                    {{ $role->name }}

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
                    @if (!empty($rolePermissions))
                        @foreach ($rolePermissions as $p)
                                {{ $p->name }}
                            <br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endSection
