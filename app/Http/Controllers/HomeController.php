<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
  public function index() {
    $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();

    $categories = Category::all();

    if (empty($posts))
    {
      abort(404);
    }

    return view('home', compact('posts', 'categories'));
  }

  public function indexByCategory(Request $request)
  {
    $data = $request->all();

    if (empty($data['category_id'])) abort(404);

    $category = Category::find($data['category_id']);
    if (empty($category)) abort(404);
    $posts = $category->posts;
    return view('categorie', compact('posts', 'category'));
  }
}
