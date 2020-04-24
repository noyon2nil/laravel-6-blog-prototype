<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'sub_category_id', 'title', 'slug', 'description', 'image',
    ];

    public function subcategory()
    {
    	return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
}
