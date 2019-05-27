<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsControllerTest extends TestCase
{
    /**
     * すべてユーザは記事一覧ページにアクセスできる
     *
     * @return void
     */
    public function testAllUserCanAccessPosts()
    {
        $response = $this->get('posts');
        $response->assertStatus(200);
    }

    /**
     * すべてのユーザはユーザ一覧を閲覧できる
     *
     * @return void
     */
    public function testAllUserCanViewUsers()
    {
        $response = $this->get('users');
        $response->assertStatus(200);
    }
}
