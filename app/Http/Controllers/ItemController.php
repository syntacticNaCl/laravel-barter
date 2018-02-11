<?php

namespace App\Http\Controllers;

use App\Item;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $image = $request->file('item_image');
        $path = '';
        if ($request->hasFile('item_image') && $image->isValid()) {
            $path = $image->store('items');
        }
        $item->image = $path;

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
        return view('items.edit', ['item' => $item]);
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

        $oldImagePath = $item->image;
        $item = Item::find($item->id);
        $item->name = $request->input('name');
        $item->quantity = $request->input('quantity');
        $item->description = $request->input('description');

        $image = $request->file('item_image');

        if ($request->hasFile('item_image') && $image->isValid()) {

            // remove old associated image
            if ($oldImagePath && !empty($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $item->image = $image->store('items');
        }


        $item->save();

        return redirect('events/' . $item->event_id)->with('success','Item has been updated!');
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

    public function claimItem(Request $request)
    {
        //
    }

    public function showUpload()
    {
        return view('events.upload');

    }

    public function upload()
    {

    }
}
