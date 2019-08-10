<?php

namespace App;

use App\Enums\PrefectureCode;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;


class Maker extends Model
{
    use CastsEnums;
    
     protected $dates = [
        'created_at',
        'updated_at'
    ];
 
    protected $enumCasts = [
        'prefecture' => PrefectureCode::class,
    ];
    
    public static function toSelectArray(){
        $makers = self::orderBy('id','asc')->pluck('name', 'id');
        return $makers -> prepend('蔵元', '');
    
    }
    
     public function liquors()
    {
        return $this->hasMany('App\Liquor');
    }
    
}
