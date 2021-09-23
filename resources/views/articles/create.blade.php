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
                <label for="body">Body :</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Pubblica</button>
        </form>
    </div>
@endsection