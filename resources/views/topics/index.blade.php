@extends('layouts.app')

@section('header')
    Dashboard
@endsection

@section('slot')
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
            @foreach ($topics as $key => $topic)
                <div class="grid grid-cols-4 gap-4">
                    <div class="flex items-center justify-center flex-col bg-gray-700 p-4 rounded-lg w-48 space-y-4">
                        <h1 class="text-gray-50 font-semibold">{{   $topic->name }}</h1>
                        
                        <a href="#"
                            class="px-8 py-1 border-2 border-indigo-600 bg-indigo-600 rounded-full text-gray-50 font-semibold">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
