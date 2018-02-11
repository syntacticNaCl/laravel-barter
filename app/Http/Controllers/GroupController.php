<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
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
            'name' => 'required|unique:groups|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('dashboard')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();


        $group = new Group();
        $group->name = $request->input('name');
        $group->admin_user_id = $user->id;
        $group->save();

        $user->groups()->attach($group->id);


        return redirect('dashboard')->with('status', 'Group added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $user = Auth::user();
        $userGroups = $user->groups;


        if (!$userGroups) {
            return redirect('dashboard')->withErrors('You do not have access to that Group');
        }

        foreach ($userGroups as $userGroup) {
            if ($group->id === $userGroup->id) {
                $userEvents = $userGroup->events;
                return view('groups.index', ['group' => $userGroup, 'events' => $userEvents]);
            }

        }

        return redirect('dashboard')->withErrors('You do not have access to that Group');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
