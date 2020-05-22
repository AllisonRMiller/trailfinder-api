<?php

namespace App\Http\Controllers;

use App\Trail;
use Illuminate\Http\Request;

class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check to see if trail is already in db

        //add link regardless
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trail = new Trail();
        $trail->api_id = $request->data('api_id');
        $trail->save();
        $response = "Trail saved!";
        return response($response, 200);
        // if ()
        //check to see if trail with api_id already exists in database
        
        //if not add
        //make link to trail_trips regardless
        // $trail = new Trail();
        // $trail->api_id = $request('api_id');
        // $trail->save();
        // $response = "Trail saved!";
        // return response($response, 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $trail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $trail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trail $trail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $trail)
    {
        //
    }
}
