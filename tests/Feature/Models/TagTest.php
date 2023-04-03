<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_InsertDatabase(): void
    {
        $data=Tag::factory()->make()->toArray();
        Tag::create($data);
        $this->assertDatabaseHas('tags',$data);
    }
    public function testTagRelationshipWithtagPost()
    {
        $count =rand(0,10);
        $tag = Tag::factory()->hasPosts($count)->create();
        // dd($user->name ,$tag->user->name);
        $this->assertCount($count,$tag->posts);
        $this->assertTrue($tag->posts->first() instanceof Post);
    }
}
