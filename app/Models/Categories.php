<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title' , 'show'
    ];
    public function news(){
        return $this->hasMany('App\Models\News' );
    }
}
