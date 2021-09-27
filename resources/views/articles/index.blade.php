   
@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{route('articles.create')}}"><button class="btn btn-primary mb-4"><i class="bi bi-plus"></i>Create a new article</button></a>

        <div class="row">
            @foreach($articles as $article)
                <div class="card col-md-4 mb-4" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $article->image }}" alt="article image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <div class="card-details">Written by: {{ $article->author->name }}</div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('articles.show', $article) }}"><button class="btn btn-primary">Read the article</button></a>

                        <form action="{{ route('articles.destroy', $article) }}" method="POST">
                            @csrf

                            @method('DELETE')

                            <button type="subimt" class="btn btn-danger">Delete the article</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection