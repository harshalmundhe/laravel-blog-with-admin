<?php

use SoftDeletes;
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;
    

    
    protected $fillable = ['title', 'body'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category() {
        return $this->belongsTo('App\Category');    
    }
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }
    
}
