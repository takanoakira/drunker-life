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
}
