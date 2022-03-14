<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:topic-list|topic-create|topic-edit|topic-delete', ['only' => ['index','show']]);
        $this->middleware('permission:topic-create',['only' =>['create','store']]);
        $this->middleware('permission:topic-edit',['only' =>['edit','update']]);
        $this->middleware('permission:topic-delete',['only' =>['destroy']]);
    }

    /**
     * Display list of topics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topics = Topic::all()->sortBy('id');
        return view('topics.index',compact('topics'));
    }

    /**
     * Show the form for creating a new topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $status = Status::all()->lists('id', 'status_name');
        $status = Status::all('id', 'status_name');
        return view('topics.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'topic_name' => 'required',
            'topic_description' => 'required',
            'status_id' => 'required'
        ]);
        $topic = new Topic;
        $topic->topic_name = $request->topic_name;
        $topic->topic_description = $request->topic_description;
        $topic->status_id = $request->status_id;
        $topic->save();
        $user_id = auth()->user()->id;
        $topic->users()->attach($user_id);

        return redirect()->route('topics.index')
                       ->with('success','Topic created successfully.');
    }

    /**
     * Display the specified topic.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('topics.show',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit',compact('topic'));
    }

    /**
     * Update the specified topic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
         request()->validate([
            'topic_name' => 'required',
            'topic_description' => 'required',
        ]);

        $topic->update($request->all());

        return redirect()->route('topics.index')
                        ->with('success','Topic updated successfully');
    }

    /**
     * Remove the specified topic from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index')
                        ->with('success','Topic deleted successfully');
    }
}
