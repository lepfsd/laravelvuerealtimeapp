<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Reply;
use App\Category;

class Question extends Model
{
    protected $fillable = array('title', 'slug', 'body', 'category_id', 'user_id');
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRoutekeyName()
    {
        return 'slug';
    } 

    public function getPathAttribute()
    {
        return "/question/$this->slug";
    }

}
