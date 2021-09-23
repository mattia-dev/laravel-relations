@extends('layouts.app')

@section('content')

<div class="container">     
    <a href="{{route('articles.index')}}"><button type="button" class="btn btn-secondary"><- Torna indietro</button></a> 
    
    <h1>{{strtoupper($article->title)}}</h1>

    <h4>By: {{ ucfirst($article->author->name) }}</h4>
            
    <img src="{{ $article->image }}" alt="{{ $article->title }}' image">
        
    <p class="text-justify">{{ $article->body }}</p>

    <div class="text-right mb-3">{{ $article->created_at }} <i class="bi bi-clock"></i></div>
</div>

@endsection