<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Category;
use App\Post;
use App\Comment;

class FirstTest extends TestCase
{
    // use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // factory(Category::class, 3)->create();

        // factory(Post::class, 10)
        //     ->create()
        //     ->each(function (Post $post) {
        //         factory(Comment::class, 2)->create([
        //             'post_id' => $post->id,
        //         ]);
        //     });

        $response = $this->get('posts');
        $response->assertStatus(200);
        // $this->assertTrue(true);
    }
}
