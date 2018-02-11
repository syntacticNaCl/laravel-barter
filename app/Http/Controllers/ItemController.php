<?php

namespace App\Http\Controllers;

use App\Item;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ItemController extends Controller
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
            'quantity' => 'required|integer|min:1',
            'description' => 'max:500'
        ]);

        $eventId = filter_var($request->input('event_id'), FILTER_SANITIZE_NUMBER_INT);

        if ($validator->fails()) {
            return redirect('events/' . $eventId)
                ->withErrors($validator)
                ->withInput();
        }


        $event = Event::find($eventId);

        $item = new Item();
        $item->name = $request->input('name');
        $item->quantity = $request->input('quantity');
        $item->description = $request->input('description');
        $item->creator_id = $request->user()->id;
        $item->save();
//
        $item->event()->associate($event);
        $item->save();


        return redirect('events/' . $eventId)
            ->with('status', 'Event added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }

    public function claimItem(Request $request, $id)
    {
        $item = Item::find($id);
        $item->claimers()->attach($request->user()->id);

        return redirect('events/' . $item->id)->with('success', 'SUCCESS');
    }
}
