<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model{

        protected $fillable = ['name'];

        public static function getTagIdByName($name) {
                $tag = Tag::firstOrCreate(['name' => strtolower($name)]);
                return $tag->id;
        }

        public function data() {
                return $this->hasMany('App\Data', 'tag_id');
        }
} 