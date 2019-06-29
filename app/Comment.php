<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'comments';
    public $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['name', 'email', 'post_id', 'parent_id', 'body'];
    
    public function post()
    {
        return $this->hasOne('App\Post');
    }
    public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
    
}
