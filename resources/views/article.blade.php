@extends('partials.layout')
@section('title', $article->title)
@section('content')
<div class="container">
    <div class="card h-100">
        @if($article->image)
            <img src="{{$article->image}}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{!! nl2br($article->body) !!}</p>
            <p class="text-body-secondary">{{ $article->user->name }}</p>
        </div>
    </div>
    <h1>Comments:</h1>
    <div class="card h-100 mt-2">
        <div class="card-body">
            <form action="{{route('comment', ['article' => $article ])}}" method="POST">
                @csrf
                <textarea class="form-control" name="body" placeholder="Write something..."></textarea>
                <input class="btn btn-primary mt-2 w-100" type="submit">
            </form>
        </div>
    </div>
    @foreach($article->comments()->latest()->get() as $comment)
        <div class="card h-100 mt-2">
            <div class="card-body">
                <p class="card-text">{{$comment->body}}</p>
                <p class="text-body-secondary">{{ $comment->user->name }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
