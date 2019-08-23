<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //キーワードを取得
        $keyword = $request->input('keyword');
        $production_area = $request->input('production_area');
        $acidity = $request->input('acidity');
        $liquors_score = $request->input('liquors_score');

        $query = \App\Liquor::select();
        
        if(!empty($keyword))
        {   
            //お酒名から検索
            $query = $query
                ->where('name', 'like', '%'.$keyword.'%')
                ->orWhereHas('maker', function($q) use ($keyword) {
                    $q->where('name', 'like','%'.$keyword.'%');
                });
        }
        
         if(!empty($production_area))
        {   
            //産地から検索
            $query = $query->where('production_area', $production_area);
            
        }
        
        if (!empty($acidity) && !empty($liquors_score)) {
            $query = $query->orderBy(sprintf("(POW($acidity - %s, 2) + POW(liquors_score - %s, 2))", $acidity, $liquors_score));
        }
        
        $data = $query->paginate(10);
        $query = $query->get();
        
        return view('home',['liquors' => $query,'keyword' => $keyword,'production_area' => $production_area,'data' => $data]);
    }
}
