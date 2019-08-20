<?php

namespace App;
use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];
    protected $fillable = [
        'title','category_id','featured','content','slug','user_id'

    ];
    //
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');

    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function profile()
    // {

    //     return $this->hasManyThrough('App\Profile', 'App\User','about');
    // }



}
