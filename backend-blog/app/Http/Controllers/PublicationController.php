<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publication\IndexRequest;
use App\Http\Requests\Publication\StoreRequest;
use App\Http\Requests\Publication\ShowRequest;
use App\Http\Requests\Publication\UpdateRequest;
use App\Http\Requests\Publication\DeleteRequest;

use App\Http\Resources\PublicationResource;
use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{

    /**
     * PublicationController constructor, only allow auth users to create, update and delete publications
     * @param IndexRequest $request
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
       return PublicationResource::collection(Publication::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $publication = new Publication;
        $publication->title = $request->title;
        $publication->content = $request->content;
        $publication->save();

        return response()->json([
            'status' => 'success',
            'data' => new PublicationResource($publication)
        ], 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request)
    {
        $publication = Publication::findOrFail($request->id);

        return response()->json([
            'status' => 'success',
            'data' => new PublicationResource($publication)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        $publication = Publication::findOrFail($request->id);

        $publication->title = $request->title;
        $publication->content = $request->content;
        $publication->save();

        return response()->json([
            'status' => 'success',
            'data' => new PublicationResource($publication)
        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteRequest $request)
    {
        $publication = Publication::findOrFail($request->id);
        $publication->delete();

        return response()->json([
            'status' => 'success',
            'data' => new PublicationResource($publication)
        ], 200);

    }
}
