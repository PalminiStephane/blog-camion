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
      $posts = Post::query();

        if ($search = $request->search) {
            $posts->where(fn (Builder $query) => $query // le where englobe les 2 autres , ça rajoute des parentheses dans la requéte sql. Ici aucunes incidences, mais si je souhaite plus tard asocier les diférents filtres les uns avec les autres.
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('content', 'LIKE', '%' . $search . '%')
            );
        }
        
      return view('posts.index', [
        'posts' => $posts->latest()->paginate(10),
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
