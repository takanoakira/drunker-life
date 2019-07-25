<?php

namespace App\Http\Controllers;

use App\Liquor;
use Illuminate\Http\Request;

class LiquorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $liquors = Liquor::all();
        return view('liquors.index', ['liquors' => $liquors]);
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
     * @param  \App\Liquor  $liquor
     * @return \Illuminate\Http\Response
     */
    public function show(Liquor $liquor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Liquor  $liquor
     * @return \Illuminate\Http\Response
     */
    public function edit(Liquor $liquor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Liquor  $liquor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liquor $liquor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Liquor  $liquor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liquor $liquor)
    {
        //
    }
}
