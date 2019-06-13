<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;

class Category extends Model
{
    protected $fillable = [
    	'name',
    	'price'
    ];
        /**
     * Get the comments for the blog post.
     */
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
