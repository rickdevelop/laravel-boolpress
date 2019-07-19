@extends('layouts.admin_app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="h1">Aggiungi post</div>
        <form class="form-group" action="{{ route('admin.posts.store') }}" method="post">
          @csrf
          @method('POST')

          <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" placeholder="Inserisci un titolo" class="form-control" />
          </div>
          <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" name="author" placeholder="Inserisci un autore" class="form-control" />
          </div>
          <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea name="content" rows="8" cols="80" placeholder="Inserisci il content" class="form-control"></textarea>
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
            <input class="form-control" type="submit" name="Salva" value="Salva">
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
