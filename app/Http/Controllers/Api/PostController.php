<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        // $posts = Post::all();

        // $posts = Post::with("category", "tags")->get();

        // $posts = Post::paginate(3);

        $posts = Post::with("category", "tags")->paginate(3);

        $response = [
            "success" => true,
            "results" => $posts
        ];

        return response()->json($response);

    }
}
