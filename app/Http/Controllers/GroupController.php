<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Get a listing of all Groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $groups = Group::all();

       return response()->json([
        'groups' => $groups,
       ]);
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
    public function store(StoreGroupRequest $request)
    {
       $group = Group::create($request->all());
       return response()->json([
        'message' => 'Group successfully created!',
        'group' => $group
       ], 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);
        return response()->json([
            'message' => 'Group Found!',
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGroupRequest $request, Group $group)
    {
        $group->update($request->all());
        return response()->json([
            'message' => 'Group updated sucessfully',
            'group' => $group,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
       $group->delete();
       return response()->json([
        'message' => 'Group deleted successfully'
       ], 200);
    }
}
