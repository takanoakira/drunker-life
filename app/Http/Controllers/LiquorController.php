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
        return view('liquors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $liquor = new Liquor;
        $liquor->name =$request->name;
        $liquor->maker_id =$request->maker_id;
        $liquor->price=$request->price;
        $liquor->alcohol=$request->alcohol;
        $liquor->acidity=$request->acidity;
        $liquor->liquor_score=$request->liquor_score;
        $liquor->production_area=$request->production_area;
        $liquor->raw_rice=$request->raw_rice;
        $liquor->milling_rate=$request->milling_rate;
        $liquor->detail=$request->detail;
        $liquor->save();
        return redirect('liquors/'.$liquor->id);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Liquor  $liquor
     * @return \Illuminate\Http\Response
     */
    public function show(Liquor $liquor)
    {
        return view('liquors.show',['liquor' => $liquor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Liquor  $liquor
     * @return \Illuminate\Http\Response
     */
    public function edit(Liquor $liquor)
    {
        return view('liquors.edit', ['liquor' => $liquor]);
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
        $liquor->name = $request->name;
        $liquor->save();
        return redirect('liquors/'.$liquor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Liquor  $liquor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liquor $liquor)
    {
        $liquor->delete();
        return redirect('liquors');
    }
}
