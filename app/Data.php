<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Data extends Model{

        protected $table = 'data';

        protected $fillable = ['lat', 'lon', 'tag_id', 'zoom', 'date'];

        protected $hidden = ['updated_at', 'tag_id', 'dataTag'];

        protected $appends = ['tag'];

        public function getTagAttribute()
        {
                return ucwords($this->dataTag->name);
        }

        public function dataTag() {
                return $this->belongsTo('App\Tag', 'tag_id');
        }

}
