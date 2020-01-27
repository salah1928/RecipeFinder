<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'name',
        'description',
        'recipe_id',
        'image',
       ];

       public function recipe()
       {
           return $this->belongsTo('App\Recipe');
       }
}
