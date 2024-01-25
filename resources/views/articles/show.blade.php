@extends('partials.layout')
@section('title', $article->title)
@section('content')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $article->id }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $article->title }}</td>
        </tr>
        <tr>
            <th>Content</th>
            <td>{{ $article->body }}</td>
        </tr>
    </table>
    <a href="{{ route('articles.index') }}" class="btn btn-primary">Back to Articles</a>
</div>
@endsection
