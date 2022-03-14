@extends('layouts.app')

@section('header')
    Topics list
@endsection

@section('slot')
    <div class="flex justify-end">
        <a class=" bg-sky-900 text-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:border-white text-sm "
            href="{{ route('topics.create') }}">Create a Topic</a>
    </div>
    <br><br>
    <div class=" items-center justify-center bg-gray-100">
        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
            <div class="grid grid-cols-3 gap-4">
                @foreach ($topics as $key => $topic)
                    <div class="flex items-center justify-center flex-col bg-gray-700 p-4 rounded-lg w-50 space-y-4">
                        <h1 class="text-gray-50 font-semibold">{{ $topic->topic_name }}</h1>
                        <a href="#"
                            class="px-8 py-1 border-2 border-indigo-600 bg-indigo-600 rounded-full text-gray-50 font-semibold">View</a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
