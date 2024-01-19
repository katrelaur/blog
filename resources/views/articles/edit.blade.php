@extends('partials.layout')
@section('title', 'Edit Article')
@section('content')
    <div class="container">
        <form action="{{ route('articles.update', ['article' => $article]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{old('title') ?? $article->title}}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Content</label>
                <textarea class="form-control @error('body') is-invalid @enderror" id="body" rows="3" name="body">{{ old('body') ?? $article->body }}</textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                @if($article->image)
                <div>
                    <img class="w-25" src="{{$article->image}}">
                </div>
                @endif
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
