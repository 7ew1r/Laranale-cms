<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Comment;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // カテゴリーを追加する
        $cat1 = new Category;
        $cat1->name = "Laravel";
        $cat1->save();

        $cat2 = new Category;
        $cat2->name = "PHP";
        $cat2->save();

        $cat3 = new Category;
        $cat3->name = "Misc.";
        $cat3->save();

        factory(Post::class, 20)
            ->create()
            ->each(function (Post $post) {
                factory(Comment::class, 3)->create([
                    'post_id' => $post->id,
                ]);
            });
    }
}
