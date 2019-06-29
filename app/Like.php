<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'user_likes';
    public $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['post_id', 'comment_id', 'ip'];
    
    public function comments(){
        return $this->hasMany('App\Like', 'post_id');
    }
    
}
