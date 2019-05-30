<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostsControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * ゲストユーザはルートにアクセスするとpostsにリダイレクトされる
     *
     * @return void
     */
    public function testAccessRootThenRedirectToPosts()
    {
        $response = $this->get('/');
        $response->assertRedirect('posts');
    }

    /**
     * ゲストユーザは記事一覧ページにアクセスできる
     *
     * @return void
     */
    public function testCanAccessPosts()
    {
        $response = $this->get('posts');
        $response->assertStatus(200);
    }

    /**
     * ゲストユーザはユーザ一覧を閲覧できる
     *
     * @return void
     */
    public function testCanAccessUsers()
    {
        $response = $this->get('users');
        $response->assertStatus(200);
    }

    /**
     * ゲストユーザはカテゴリ一覧を閲覧できる
     *
     * @return void
     */
    public function testCanAccessCategories()
    {
        $response = $this->get('categories');
        $response->assertStatus(200);
    }

    /**
     * ゲストユーザはログインページを閲覧できる
     *
     * @return void
     */
    public function testCanAccessLogin()
    {
        $response = $this->get('login');
        $response->assertStatus(200);
    }
    /**
     * ゲストユーザはユーザー登録ページを閲覧できる
     *
     * @return void
     */
    public function testCanAccessRegister()
    {
        $response = $this->get('register');
        $response->assertStatus(200);
    }

    /**
     * ゲストユーザは記事投稿ページにアクセス出来ず、ログインページにリダイレクトされる
     *
     * @return void
     */
    public function testCannotAccessCreatePost()
    {
        $response = $this->get('/posts/create');
        $response->assertRedirect('login');
    }

    /**
     * ゲストユーザは全ての記事を閲覧できる
     *
     * @return void
     */
    public function testCanAccessAnyPostPages()
    {
        Artisan::call('db:seed');

        $posts = Post::All();
        foreach ($posts as $post) {
            $response = $this->get("/posts/{$post->id}");
            $response->assertStatus(200);
        }
    }

    /**
     * ゲストユーザは全てのユーザーページを閲覧できる
     *
     * @return void
     */
    public function testCanAccessAnyUserPages()
    {
        Artisan::call('db:seed');

        $users = User::All();
        foreach ($users as $user) {
            $response = $this->get("/users/{$user->id}");
            $response->assertStatus(200);
        }
    }
}
