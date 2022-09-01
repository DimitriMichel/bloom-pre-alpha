<?php

namespace Tests\Feature;

use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupAPI extends TestCase
{
    use RefreshDatabase;

    /**
     * Create a group.
     *
     * @return void
     */
    public function test_create_a_group()
    {
        $response = $this->postJson('api/groups',['name' => 'Test Group',]);
        $response->assertCreated();
        $this->assertDatabaseHas('groups', ['name' => 'Test Group',]);
    }

   /**
     * Get all existing groups.
     *
     *
     */
    public function test_get_all_groups()
    {

        $response = $this->postJson('api/groups',['name' => 'First Group',]);
        $response = $this->postJson('api/groups',['name' => 'Second Group',]);

        $response = $this->getJson('api/groups');

        $response->assertOk();

        $this->assertDatabaseHas('groups', ['name' => 'First Group',]);
        $this->assertDatabaseHas('groups', ['name' => 'Second Group',]);
    }

     /**
     * Get a specific group.
     *
     *
     */
    public function test_get_a_specific_group()
    {
       $group = Group::factory()->create();
    
       $response = $this->getJson("api/groups/$group->id")
       ->assertOk()
       ->assertJsonStructure([
        'message',
        'group'
       ]);
    }

    /**
     * Update a specific group.
     *
     *
     */
    public function test_update_a_group()
    {
        $group = Group::factory()->create();

        //Change Group Name
        $this->putJson("api/groups/$group->id", ['name' => 'Updated Group Name']);

        //Get Group with updated Group name
        $this->getJson("api/groups/$group->id")->assertJsonFragment(['name' => 'Updated Group Name']);
    }

     /**
     * Delete a specific group.
     *
     *
     */
    public function test_delete_a_specific_group()
    {
        $group = Group::factory()->create();

        $response = $this->deleteJson("api/groups/$group->id")
        ->assertNoContent();
    }
}
