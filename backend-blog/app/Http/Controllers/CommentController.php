<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\IndexRequest;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\ShowRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Requests\Comment\DeleteRequest;

use App\Models\Comment;


class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        
        $comments = Comment::paginate();

        return response()->json([
            'status' => 'success',
            'data' => $comments
        ], 201);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $comment = new Comment();
        $comment->id_user = $request->user()->id;
        $comment->id_publication = $request->id_publication;
        $comment->content = $request->content;
        $comment->save();

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request)
    {
        $comment = Comment::where('id_publication',$request->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ], 201);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        $comment = Comment::find($request->id);
        $comment->content = $request->content;
        $comment->save();

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteRequest $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ], 201);
    }
    
}
