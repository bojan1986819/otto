<?php

namespace App;

use App\Traits\HasMetas;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasMetas;

    public function metas(){
        return $this->morphMany('App\Meta', 'parent');
    }

    public function casts(){
        return $this->hasMany('App\Cast');
    }
}
