<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
