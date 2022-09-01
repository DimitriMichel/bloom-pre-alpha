<?php

namespace Tests\Feature;

use App\Models\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganizationApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create an organization.
     *
     * @return void
     */
    public function test_create_an_organization()
    {
        $response = $this->postJson('api/organizations',['name' => 'Test Organization',]);
        $response->assertCreated();
        $this->assertDatabaseHas('organizations', ['name' => 'Test Organization',]);
    }

   /**
     * Get all existing organizations.
     *
     *
     */
    public function test_get_all_organizations()
    {

        $response = $this->postJson('api/organizations',['name' => 'First Organization',]);
        $response = $this->postJson('api/organizations',['name' => 'Second Organization',]);

        $response = $this->getJson('api/organizations');

        $response->assertOk();

        $this->assertDatabaseHas('organizations', ['name' => 'First Organization',]);
        $this->assertDatabaseHas('organizations', ['name' => 'Second Organization',]);
    }

     /**
     * Get a specific organization.
     *
     *
     */
    public function test_get_a_specific_organization()
    {
       $organization = Organization::factory()->create();
    
       $response = $this->getJson("api/organizations/$organization->id")
       ->assertOk()
       ->assertJsonStructure([
        'message',
        'organization'
       ]);
    }

    /**
     * Update a specific organization.
     *
     *
     */
    public function test_update_an_organization()
    {
        $organization = Organization::factory()->create();

        //Change Group Name
        $response = $this->putJson("api/organizations/$organization->id", ['name' => 'Updated Org Name']);
 
        //Get Group with updated Group name
        $this->getJson("api/organizations/$organization->id")->assertJsonFragment(['name' => 'Updated Org Name']);
    }

     /**
     * Delete a specific organization.
     *
     *
     */
    public function test_delete_a_specific_organization()
    {
        $organization = Organization::factory()->create();

        $response = $this->deleteJson("api/organizations/$organization->id")
        ->assertNoContent();
    }
}
