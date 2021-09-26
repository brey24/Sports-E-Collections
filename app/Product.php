<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name', 
    	'price', 
    	'image', 
    	'category_id', 
    	'description'
    ];

    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
