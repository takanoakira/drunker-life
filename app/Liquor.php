<?php

namespace App;

use App\Enums\PrefectureCode;
use Illuminate\Database\Eloquent\Model;
use BenSampo\Enum\Traits\CastsEnums;

class Liquor extends Model
{
    use CastsEnums;
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
 
    protected $enumCasts = [
        'production_area' => PrefectureCode::class,
    ];
    
    public static $rules = array(
        'name' => 'required',
        'maker_id' => 'required',
        'price' => 'required|integer|min:1|',
        'alcohol' => 'required|numeric|min:1|',
        'acidity' => 'required|numeric|min:0|max:3|',
        'liquor_score' => 'required|numeric|min:-30|max:30|',
        'production_area' =>'required',
        'raw_rice' => 'required',
        'milling_rate' => 'required',
        'detail' => 'required',
    );
    
     public function maker()
    {
        return $this->belongsTo('App\Maker');
    }
    
}
