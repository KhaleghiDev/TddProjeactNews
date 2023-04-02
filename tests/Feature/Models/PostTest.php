<?php

namespace Tests\Feature\Models;

use App\Models\Post;
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
     $data =Post::factory()->make()->toArray();
        Post::create($data);
        $this->assertDatabaseHas('posts',$data);
    }
}