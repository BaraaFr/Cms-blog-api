<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['user_id','thumbnail','title','slug','details','post_type','is_published','category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function gallery()
    {
        return $this->hasOne(Gallery::class);
    }
    
}
