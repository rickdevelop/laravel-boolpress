@extends('layouts.admin_app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Posts aggiornati</h1>
        <form class="form-group" action="{{ route('home.indexByCategory') }}" method="get">
          <div class="form-group">
            <label for="category_id">Filtra Posts </label>
            <select class="form-control"name="category_id">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
            <input class="form-control btn btn-success" type="submit" value="Filtra" />
          </div>
        </form>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Creato il</th>
              <th>Titolo</th>
              <th>Autore</th>
              <th>Testo</th>
              <th> Categoria</th>
              <th>Visualizza</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $post)
              <tr>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ str_limit($post->content, 10, ' (...)') }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                  <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-danger">Visualizza Post</a>
                </td>
              </tr>
            @empty
              <h2>Non sono presenti post</h2>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
