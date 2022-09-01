<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Models\Organization;

class OrganizationController extends Controller
{
    /**
     * Get a listing of all organizations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $organizations = Organization::all();

       return response()->json([
        'organizations' => $organizations,
       ]);
    }

    /**
     * Store a newly created organization.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizationRequest $request)
    {
       $organization = Organization::create($request->all());
       return response()->json([
        'message' => 'Organization successfully created!',
        'organization' => $organization
       ], 201); 
    }

    /**
     * Retrieve the specified organization.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return response()->json([
            'message' => 'Organization Found!',
            'organization' => $organization,
        ]);
    }

    /**
     * Update the specified organization.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->all());
        return response()->json([
            'message' => 'Organization updated sucessfully',
            'organization' => $organization,
        ], 200);
    }

    /**
     * Delete the specified organization.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
       $organization->delete();
       return response()->json([
        'message' => 'organization deleted successfully'
       ], 204);
    }
}
