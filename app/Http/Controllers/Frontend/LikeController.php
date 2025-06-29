<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    public function toggle(Request $request, Post $post)
    {
        $sessionId = Session::getId();

        $like = $post->likes()->where('session_id', $sessionId)->first();

        if ($like) {
            // Unlike
            $like->delete();
            $liked = false;
        } else {
            // Like
            $post->likes()->create(['session_id' => $sessionId]);
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'count' => $post->likes()->count(),
        ]);
    }
}
