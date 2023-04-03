<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testInsetDatabase(): void
    {
        $data= User::factory()->make()->toArray();
        $data['password']='123456';
        // dd($data);
        User::create($data);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users',$data);

    }
    public function testUserRelationshipWithPost()
    {
        $count =rand(0,10);
        $user = User::factory()->hasPosts($count)->create();
        // dd($user->name ,$post->user->name);
        $this->assertCount($count,$user->posts);
        $this->assertTrue($user->posts->first() instanceof Post);
    }

}
