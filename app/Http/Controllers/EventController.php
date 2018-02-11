<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'max:500'
        ]);

        $groupId = filter_var($request->input('group_id'), FILTER_SANITIZE_NUMBER_INT);

        if ($validator->fails()) {
            return redirect('groups/' . $groupId)
                ->withErrors($validator)
                ->withInput();
        }


        $group = Group::find($groupId);
        $startDate = $request->input('event_start');
        $endDate = $request->input('event_end');

        // TODO: implement time selector

        $event = new Event();
        $event->name = $request->input('name');
        $event->location = $request->input('location');
        $event->description = $request->input('description');
        $event->event_start = $startDate;
        $event->event_end = $endDate;
        $event->save();
//
        $event->group()->associate($group);
        $event->save();


        return redirect('groups/' . $groupId)
            ->with('status', 'Event added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $items = $event->items;

        return view('events.index', ['event' => $event, 'items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
