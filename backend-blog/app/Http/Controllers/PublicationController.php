<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publication\IndexRequest;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
