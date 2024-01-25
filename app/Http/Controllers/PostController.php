<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StoringPostRequest;
use App\Models\Post;
use App\Models\PostPhoto;
use App\Services\PostService\StoringPostService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function store(StoringPostRequest $request)
    {
        return (new StoringPostService())->store($request);
    }

    function index()
    {
        $post = Post::all();
        return response()->json([
            "posts" => $post,
        ]);
    }

    function approved()
    {
        $posts = Post::where('status', 'approved')->get();
        return response()->json([
            "posts" => $posts,
        ]);
    }
}
