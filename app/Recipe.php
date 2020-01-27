<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'ingredients',
        'description',
        'user_id',
        'image',
       ];

       public function user()
       {
           return $this->belongsTo('App\User');
       }
       
       public function steps(){
        return $this->hasMany('App\Step');
    }
       public function comments(){
        return $this->hasMany('App\Comment');
    }
}
