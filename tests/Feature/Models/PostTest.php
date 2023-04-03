<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testInsetDatabase(): void
    {
        $data = Post::factory()->make()->toArray();
        Post::create($data);
        $this->assertDatabaseHas('posts', $data);
    }
    public function testPostRelationshipWithUser()
    {
        $user=User::factory()->create();
        $post = Post::factory()->create(['user_id'=>$user->id]);
        // dd($user->name ,$post->user->name);
        $this->assertTrue(isset($post->user->id));
        $this->assertTrue($post->user instanceof User);
    }
}
