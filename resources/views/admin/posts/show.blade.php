@extends('layouts.admin_app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Visualizza il post</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Id</th>
              <th>Titolo</th>
              <th>Autore</th>
              <th>Content</th>
              <th>Nome Categoria</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ str_limit($post->content, 10, ' (...)') }}</td>
                <td>{{ $post->category->title }}</td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
