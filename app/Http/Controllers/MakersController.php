<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maker;

class MakersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $prefectur = $request->input('prefecture');
        $makers = Maker::select();
        
         if(!empty($prefectur))
        {   
            //都道府県から検索
            $makers = $makers->where('prefecture', $prefectur);
            
        }
        
        $data = $makers->orderBy('created_at','desc')->paginate(10);
        $makers = $makers->get();
        return view('makers.index', ['makers' => $makers,'prefecture' => $prefectur,'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('makers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maker = new Maker;
        $maker->name = $request->name;
        $maker->prefecture = $request->prefecture;
        $maker->address = $request->address;
        $maker->phone_number = $request->phone_number;
        $maker->detail = $request->detail;
        $maker->url = $request->url;
        $maker->save();
        return redirect('makers/'.$maker->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Maker $maker)
    {
         return view('makers.show', ['maker' => $maker]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Maker $maker)
    {
        return view('makers.edit', ['maker' => $maker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maker $maker)
    {
        $maker->name = $request->name;
        $maker->prefecture = $request->prefecture;
        $maker->address = $request->address;
        $maker->phone_number = $request->phone_number;
        $maker->detail = $request->detail;
        $maker->url = $request->url;
        $maker->save();
        return redirect('makers/'.$maker->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maker->delete();
        return redirect('makers');
    }
}
