<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;


class PostController extends Controller
{
    public function index(Request $request)
    {
      return $this->postsView($request->search ? ['search' => $request->search] : []);
    }

    public function postByCategory(Category $category): View
    {
      return $this->postsView(['category' => $category]);
    }

    public function postByTag (Tag $tag): View
    {
      return $this->postsView(['tag' => $tag]);
    }

    protected function postsView(array $filters): View
    {
      return view('posts.index', [
        'posts' => Post::filters($filters)->latest()->paginate(10),
      ]);
    }

    public function show(Post $post): View
    {
      return view('posts.show', [
        'post' => $post,
      ]);
    }
}
