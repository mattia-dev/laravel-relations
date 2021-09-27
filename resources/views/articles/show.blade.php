@extends('layouts.app')

@section('content')

<div class="container">   
    <a href="{{route('articles.index')}}"><button type="button" class="btn btn-secondary mb-4"><- Torna indietro</button></a> 
    
    <h1>{{strtoupper($article->title)}}</h1>

    <h4>By: {{ ucfirst($article->author->name) }}</h4>
            
    <img src="{{ $article->image }}" alt="{{ $article->title }}' image">

    @foreach($article->tag as $tag)
        <span class="badge bg-primary">{{ $tag->name }}</span>
    @endforeach
        
    <p class="text-justify">{{ $article->body }}</p>

    <div class="text-right mb-3">{{ $article->created_at }} <i class="bi bi-clock"></i></div>

    <h4>COMMENTS</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comments.store') }}" method="post">
        @csrf

        <input type="hidden" id="article_id" name="article_id" value="{{ $article->id }}">

        <div class="form-group">
            <textarea class="form-control" name="comment" id="comment" cols="30" rows="5" placeholder="Write a comment..."></textarea>
        </div>

        <div class="clearfix">
            <button class="btn btn-primary float-right" type="submit">Commenta</button>
        </div>
    </form>

    <div id="app">
        <Comments /> 
    </div>

    <h4>Comments without Vue</h4>

    @foreach($article->comment as $comment)
        <div class="comment">
            <h5>{{ $comment->user->name }}</h5>

            <p>{{ $comment->body }}</p>
        </div>
    @endforeach
</div>

@endsection