<x-app-layout>
    <x-slot name="header">
        @section('header')
            Dashboard
        @endsection
    </x-slot>

    @section('slot')
        You're log in!!
    @endsection
</x-app-layout>
