<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    protected $table = 'user_follow';
    public $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['followee_id', 'follower_id', 'ip'];
}
