<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Tag;

class Room extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'category_id'
    ];

        /**
     * Get the post that owns the comment.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
