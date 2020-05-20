<?php

namespace App\Http\Controllers;

use App\Search;
use App\RecentCalls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Mime\Header\Headers;
use Throwable;


//return response()->json(['error' => $e->getMessage()], 500);

class SearchController extends Controller
{

    public function search(Request $request){
        // Http::fake([
        //     'www.hikingproject.com/*' => Http::response( ['Headers'])
        // ]);
        // dd($request);
        $lat=$request->input('lat');
        $lng=$request->input('lng'); 
        try{
            
            $response = Http::get(
                'https://www.hikingproject.com/data/get-trails?lat=' . $lat . '&lon='. $lng .'&maxDistance=10&key=200747499-3d3cab16ebe912a88d76d82693eee11c'
            );
        }
        catch (Throwable $e) {
            $response->throw();
            response()->json(['error' => $e-> getMessage()]);
        }
        // $response->RecentCalls::create([
            
        // ]);
        return $response;
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}
