<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function home(){
        $articles = Article::latest()->paginate(16);
        //dd($articles->toArray());
        return view('welcome', compact('articles'));
        //return view('welcome', ['articles' => $articles]);
    }

    public function about(){
        return view('about');
    }

    public function article(Article $article){
        return view('article', compact('article'));
    }

    public function user(User $user){
        $articles = $user->articles()->latest()->paginate(16);
        return view('welcome', compact('articles'));
    }

    public function comment(Article $article, StoreCommentRequest $request){
        $comment = new Comment($request->validated());
        $comment->user()->associate(auth()->user());
        $comment->article()->associate($article);
        $comment->save();
        return redirect()->back();
    }
}
