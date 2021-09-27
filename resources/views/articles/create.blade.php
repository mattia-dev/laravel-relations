@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('articles.index')}}"><button type="button" class="btn btn-secondary mb-4"><- Torna indietro</button></a> 

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Titolo :</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="author_id">Options</label>
                    </div>
                    
                    <select class="custom-select" id="author_id" name="author_id">
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            

            <div class="form-group">
                <label for="image">Immagine :</label>
                <input class="form-control" type="text" name="image" id="image">
            </div>

            <div class="form-group">
                <strong>Select tags:</strong>
                @foreach($tags as $tag)
                    <div class="d-flex align-items-center">
                        <input class="mr-1" type="checkbox" name="tags[]" value="{{ $tag->id }}">
                        <label class="m-0">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="body">Body :</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
            </div>

            <div class="clearfix">
                <button class="btn btn-primary float-right" type="submit">Pubblica</button>
            </div>
        </form>
    </div>
@endsection