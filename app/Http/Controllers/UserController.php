<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
      /**
     * Get a listing of all Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::all();

       return response()->json([
        'users' => $users,
       ]);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
       $user = User::create($request->all());
       return response()->json([
        'message' => 'User successfully created!',
        'user' => $user
       ], 201); 
    }

    /**
     * Display the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'message' => 'User Found!',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, User $user)
    {
        $user->update($request->all());
        return response()->json([
            'message' => 'User updated sucessfully',
            'user' => $user,
        ], 200);
    }

    /**
     * Remove the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $user->delete();
       return response()->json([
        'message' => 'User deleted successfully'
       ], 204);
    }
}
