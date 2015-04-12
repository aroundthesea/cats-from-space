<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

        public function locations() {
                return $this->hasMany('App\Location', 'category_id');
        }
}
