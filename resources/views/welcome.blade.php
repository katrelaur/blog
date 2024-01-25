@extends('partials.layout')
@section('title', 'Home page')
@section('content')
<div class="container">
    {{$articles->links()}}
    <div class="row">
        @foreach($articles as $article)
            <div class="col-3 mb-3">
                <div class="card h-100">
                    @if($article->image)
                        <img src="{{$article->image}}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $article->title }}</h5>
                      <p class="card-text">{{ $article->snippet }}</p>
                      <p class="text-body-secondary">
                        <a href="{{route('user', ['user' => $article->user])}}">{{ $article->user->name}}</a>
                      </p>
                      <p class="text-body-secondary">
                        <b>Comments: </b> {{$article->comments()->count()}}
                      </p>
                      <a href="{{route('article', ['article' => $article])}}" class="btn btn-primary">Read more!</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{$articles->links()}}
</div>
@endsection
