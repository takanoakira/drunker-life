<?php

namespace App;

use App\Enums\PrefectureCode;
use Illuminate\Database\Eloquent\Model;


class Maker extends Model
{
     protected $dates = [
        'created_at',
        'updated_at'
    ];
 
    protected $enumCasts = [
        'prefecture' => PrefectureCode::class,
    ];
}
