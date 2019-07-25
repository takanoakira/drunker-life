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
}
