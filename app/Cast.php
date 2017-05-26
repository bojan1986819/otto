<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
