<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create a post.
     *
     * @return void
     */
    public function test_create_a_post()
    {
        $response = $this->postJson('api/posts',['body' => 'Test Post',]);
        $response->assertCreated();
        $this->assertDatabaseHas('posts', ['body' => 'Test Post',]);
    }

   /**
     * Get all existing posts.
     *
     *
     */
    public function test_get_all_posts()
    {

        $response = $this->postJson('api/posts',['body' => 'First Post',]);
        $response = $this->postJson('api/posts',['body' => 'Second Post',]);

        $response = $this->getJson('api/posts');

        $response->assertOk();

        $this->assertDatabaseHas('posts', ['body' => 'First Post',]);
        $this->assertDatabaseHas('posts', ['body' => 'Second Post',]);
    }

     /**
     * Get a specific post.
     *
     *
     */
    public function test_get_a_specific_post()
    {
       $post = Post::factory()->create();
    
       $response = $this->getJson("api/posts/$post->id")
       ->assertOk()
       ->assertJsonStructure([
        'message',
        'post'
       ]);
    }

    /**
     * Update a specific post.
     *
     *
     */
    public function test_update_a_post()
    {
        $post = Post::factory()->create();

        //Change Post body
        $response = $this->putJson("api/posts/$post->id", ['body' => 'Changed Text']);
 
        //Get Post with updated body
        $this->getJson("api/posts/$post->id")->assertJsonFragment(['body' => 'Changed Text']);
    }

     /**
     * Delete a specific post.
     *
     *
     */
    public function test_delete_a_specific_post()
    {
        $post = Post::factory()->create();

        $response = $this->deleteJson("api/posts/$post->id")
        ->assertNoContent();
    }
}
