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
        $liquor_score = $request->input('liquor_score');

        $query = \App\Liquor::select();
        
        if(!empty($keyword))
        {   
            //お酒名、販売元名から検索
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
        
        if (!empty($acidity) && !empty($liquor_score)) {
            $image_width = 531.0;
            $image_height = 308.0;
            $acidity_range = 3.0 - 0.0;
            $liquor_score_range = 30.0 - (-30.0);
            $acidity_rate = ($image_height / $image_width) * ($liquor_score_range / $acidity_range);

            \Log::info("距離: ".(sqrt(pow(($acidity - 1.5) * $acidity_rate, 2) + pow($liquor_score - 0.0, 2))));
            
            $order_setting = sprintf("SQRT(POW((acidity - %f) * %f, 2) + POW(liquor_score - %f, 2))", $acidity, $acidity_rate, $liquor_score);
            # \Log::info("条件: ".$order_setting);
            $query = $query->orderByRaw($order_setting);
        }else{
            $query = $query->orderBy("id");
        }
        
        $data = $query->paginate(10);
        $query = $query->get();
        
        return view('home',[
            'liquors' => $query,
            'keyword' => $keyword,
            'production_area' => $production_area,
            'data' => $data,
            'acidity' => $acidity,
            'liquor_score' => $liquor_score
        ]);
    }
}
