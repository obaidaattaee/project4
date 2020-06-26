<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'category_id' ,
        'sammary' ,
        'details' ,
        'published' ,
    ];
    public function category(){
        return $this->belongsTo('App\Models\Categories' , 'category_id' , 'id' );
    }
}
