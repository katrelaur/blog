<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        $users = User::all();
        foreach($articles as $article){

            $comments = Comment::factory(rand(5,10))->make(['article_id' => $article->id]);
            foreach($comments as $comment){
                $comment->user_id = $users->random()->id;
                $comment->save();
            }
        }
    }
}
