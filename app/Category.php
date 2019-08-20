<?php

namespace App;
use Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use SoftDeletes;
    protected $date = ['deleted_at'];

    public function posts()
    {

            return $this->hasMany('App\Post');

    }
}
