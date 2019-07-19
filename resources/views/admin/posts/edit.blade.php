@extends('layouts.admin_app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="h1">Aggiorna post</div>
        <form class="form-group" action="{{ route('admin.posts.update', $post->id) }}" method="post">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" placeholder="Modifica il titolo" class="form-control" value="{{ $post->title }}" />
          </div>
          <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" name="author" placeholder="Modifica l'autore" class="form-control" value="{{ $post->author }}" />
          </div>
          <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea name="content" rows="8" cols="80" placeholder="Modifica il contentuto" class="form-control">{{ $post->content }}</textarea>
          </div>
          <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control" name="category_id">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <input class="form-control" type="submit" name="Salva" value="Salva" />
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
