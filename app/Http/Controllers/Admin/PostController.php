<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::with('category')->get();
      return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
      $categories = Category::all();
      return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
      $data = $request->all();

      $newPost = new Post;
      $newPost->fill($data);
      $newPost->save();

      return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
      if (empty($post)) {
        return abort(404);
      }

      return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
      if (empty($post)) {
        return abort(404);
      }
      $categories = Category::all();

      return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
      $data = $request->all();

      $post->update($data);

      return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
      $post->delete();

      return redirect()->route('admin.posts.index');
    }
}
