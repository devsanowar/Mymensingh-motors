<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Postcategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $pageTitle = 'Blog';
        $blogs = Post::latest()->paginate(8);

        $postCategories = Postcategory::with('posts:id,post_title,category_id')->where('category_name', '!=', 'default')->latest()->get();

        $recentPosts = Post::latest()
            ->limit(4)
            ->get(['id', 'post_title', 'post_slug', 'image','created_at']);

        return view('website.blog', compact('blogs', 'recentPosts', 'pageTitle', 'postCategories'));
    }

    public function blogSinglePage($post_slug)
    {
        $singleBlogPage = Post::with('category:id,category_name')->where('post_slug', $post_slug)->firstOrFail();
        $singleBlogPage->increment('views');

        $recentBlogs = Post::latest()
            ->limit(4)
            ->get(['id', 'post_title', 'post_slug', 'post_content', 'image', 'created_at']);

        $postCategories = Postcategory::with('posts:id,post_title,category_id')->where('category_name', '!=', 'default')->latest()->get();

        $blog = Post::where('post_slug', $post_slug)->firstOrFail();
        return view('website.layouts.pages.blog.blog_single_page', compact('singleBlogPage', 'recentBlogs', 'postCategories'));
    }
}
