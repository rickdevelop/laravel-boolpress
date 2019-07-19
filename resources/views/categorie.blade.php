@extends('layouts.admin_app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Tutti i post della categoria: {{ $category->title }}</h1>
        <table class="table">
          <thead>
            <tr>
              <th>Creato il</th>
              <th>Titolo</th>
              <th>Autore</th>
              <th>Contenuto</th>
              <th>Nome Categoria</th>
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
