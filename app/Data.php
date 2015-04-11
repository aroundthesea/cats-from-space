<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Data extends Model{

        protected $table = 'data';

        protected $fillable = ['lat', 'lon', 'tag_id', 'zoom', 'date'];
}
