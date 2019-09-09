<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function liquors()
    {
        return $this->belongsToMany('App\Liquor');
    }

    public static $rules = array(
        'name' => 'required|unique'
    );
}
