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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'content'   => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success'   => false,
                'message'   => 'semua kolom wajib diiisi',
                'data'      => $validator->errors()
            ],401);
        }else{
            $post = PostModel::create([
                'title'     => $request->input('title'),
                'content'   => $request->input('content')
            ]);

            if($post){
                return response()->json([
                    'success'   => true,
                    'message'   => 'Post berhasil disimpan',
                    'data'      => $post
                ],201);
            }else{
                return response()->json([
                    'success'   => false,
                    'message'   => 'post gagal disimpan'
                ],400);
            }
        }
    }


    public function show($id)
    {
        $post = PostModel::find($id);

        if($post){
            return response()->json([
                'success'   => true,
                'message'   => 'Detail post',
                'data'      => $post
            ],200);
        }else{
            return response()->json([
                'success'   => false,
                'message'   => 'Data tidak ditemukan'
            ],404);
        }
    }


    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'content'   => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success'   => false,
                'message'   => 'semua kolom wajib diisi',
                'data'      => $validator->errors()
            ],401);
        }else{
            $post = PostModel::whereId($id)->update([
                'title'     => $request->input('title'),
                'content'   => $request->input('content')
            ]);

            if($post){
                return response()->json([
                    'success'   => true,
                    'message'   => 'Post berhasil di update',
                    'data'      => $post
                ],201);
            }else{
                return response()->json([
                    'success'   => false,
                    'message'   => 'post gagal diupdate',
                ],400);
            }
        }
    }
}
