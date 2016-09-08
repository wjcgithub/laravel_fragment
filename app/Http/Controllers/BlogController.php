<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class BlogController extends Controller
{
    public function index()
    {
        echo Route::controller('series', 'SeriesController');
        exit;
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return view('blog.post')->withPost($post);
    }
}
