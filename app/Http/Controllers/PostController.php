<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
      return view('posts.index', [
        'posts' => Post::latest()->paginate(10),
      ]);
    }

    public function postByCategory(Category $category): View
    {
      return view('posts.index', [
        // 'posts' => $category->posts()->latest()->paginate(10),
        'posts' => Post::where(
          'category_id', $category->id
          )->latest()->paginate(10),
      ]);
    }

    public function postByTag (Tag $tag): View
    {
      return view('posts.index', [
        // 'posts' => $tag->posts()->latest()->paginate(10),
        'posts' => Post::whereRelation(
          'tags', 'tags.id', $tag->id
          )->latest()->paginate(10),
      ]);
    }
    public function show(Post $post): View
    {
      return view('posts.show', [
        'post' => $post,
      ]);
    }
}
