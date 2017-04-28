<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public $fillable = ['key', 'value'];

    public function parent()
    {
        return $this->morphTo();
    }
}
