<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

        protected $fillable = ['lat', 'lon', 'category_id', 'name'];

        protected $hidden = ['updated_at', 'created_at', 'category_id', 'categoryObj'];

        protected $appends = ['category'];

        public function getCategoryAttribute()
        {
                return ucwords($this->categoryObj->name);
        }

        public function categoryObj() {
                return $this->belongsTo('App\Category', 'category_id');
        }

}
