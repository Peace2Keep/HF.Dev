<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Price extends Model
{
        protected $fillable = [
    	'price',
    	'tax',
    	'category_id'
    ];

        /**
     * Get the post that owns the comment.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
}
}
