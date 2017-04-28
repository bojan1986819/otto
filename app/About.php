<?php

namespace App;

use App\Traits\HasMetas;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasMetas;

    public function metas(){
        return $this->morphMany('App\Meta', 'parent');
    }
}
