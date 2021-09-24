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
</div>

@endsection