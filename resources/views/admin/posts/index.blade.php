@extends('layouts.admin_app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Tutti i post</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Titolo</th>
              <th>Autore</th>
              <th>Content</th>
              <th>Nome Categoria</th>
              <th>Visualizza</th>
              <th>Aggiorna</th>
              <th>Elimina</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ str_limit($post->content, 10, ' (...)') }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                  <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Visualizza</a>
                </td>
                <td>
                  <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-success">Aggiorna</a>
                </td>
                <td>
                  <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Cancella">
                  </form>
                </td>

              </tr>
            @empty
              <h2>Non ci sono Post</h2>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
