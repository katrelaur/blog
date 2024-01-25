@extends('partials.layout')
@section('title', 'Articles')
@section('content')
<div class="container">
    <a href="{{route('articles.create')}}" class="btn btn-primary">New Article</a>
    @if(request()->routeIs('articles.deleted'))
        <a href="{{route('articles.index')}}" class="btn btn-secondary">Published Articles</a>
    @else
        <a href="{{route('articles.deleted')}}" class="btn btn-secondary">Deleted Articles</a>
    @endif
    {{$articles->links()}}
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->slug}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>{{$article->updated_at}}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-success" href="{{ route('articles.show', $article->slug) }}">View</a>
                            <a class="btn btn-warning" href="{{route('articles.edit', ['article' => $article])}}">Edit</a>
                            <button form="delete-{{$article->id}}" class="btn btn-danger">Delete</button>
                        </div>
                        <form id="delete-{{$article->id}}" action="{{route('articles.destroy', ['article' => $article])}}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
