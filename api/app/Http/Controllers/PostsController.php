<?php

namespace App\Http\Controllers;

use App\Models\PostModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        $posts = PostModel::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Post',
            'data'    => $posts
        ], 200);
    }
}
