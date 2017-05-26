<?php

namespace App\Traits;

use App\Meta;

trait HasMetas
{
    public function __get($property){
        $meta = $this->getMeta($property);
        if(!$meta){
            return parent::__get($property);
        }
        else{
            return $meta->value;
        }
    }

    public function setMeta($property, $value){
        if(!$value){

        } else {
            $meta = $this->getMeta($property);
            if (!$meta) {
                $meta = new Meta(['key' => $property, 'value' => $value]);
                $meta->parent()->associate($this)
                    ->save();
            } else {
                $meta->update(['value' => $value]);
            }
        }
    }

    public function dropMeta($property){
        $meta = $this->getMeta($property);
        if (!$meta) {
        } else {
            $meta->delete();
        }
    }


    private function getMeta($property){
        return $this->metas()->where('key', $property)->first();
    }

    public function hasMeta($property){
        return $this->metas()->where('key', $property)->exists();
    }

    public function metaKeys(){
        return $this->metas->map(function ($values) {return $values->key; });
    }
}
