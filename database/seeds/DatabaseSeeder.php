<?php

use App\Anything;
use App\Article;
use App\Comment;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create();
        $article = factory(Article::class)->create();

        $attributes = [
            'article_id' => $article->id,
            'user_id' => $user->id,
        ];

        $this->createComments($attributes);
    }

    private function createComments(array $attributes, $amount = 3, $depth = 3, $parent = null)
    {
        for($i = 0; $i < $amount; $i++) {
            $comment = factory(Comment::class)->make($attributes);

            if($parent === null) {
                $comment->save();
            } else {
                $parent->children()->save($comment);
            }

            if ($depth > 1) {
                $this->createComments($attributes, $amount, $depth - 1, $comment);
            }
        }
    }
}
