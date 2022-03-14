@extends('layouts.app')

@section('header')
    Crate a Topic
@endsection
@section('slot')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full max-w-sm">
            <form name="create_topic" id="create_topic" method="POST" action="{{ route('topics.store') }}">
                @csrf
                <!--Topic Name -->
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="username">
                            Topic
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input type="text" id="topic_name" name="topic_name"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                    </div>
                </div>
                <!--Topic Status -->
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Status
                        </label>
                    </div>

                    <div class="md:w-2/3">
                        <select name="status_id" id="status_id"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                            @foreach ($status as $key => $s)
                                <option value=" {{ $s->id }}">{{ $s->status_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <!--Topic Description -->
                <div class="w-full max-w-sm">
                            <label>Content</label>
                            <textarea id="tinymce" name="topic_description"></textarea>
                </div>
                <!--Created By -->

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Created By
                        </label>
                    </div>

                    <div class="md:w-2/3">
                        <input placeholder="{{ Auth::user()->name }}" readonly
                            class="cursor-not-allowed bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                             leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
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
            </form>
        </div>
    </div>
@endSection
