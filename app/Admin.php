<?php

namespace App;
/**
 *   use Illuminate\Database\Eloquent\Model;
 */
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;
    //authentication gaurd for admin
    
    protected $guard = "admin";
    /**
     * Attribute that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'email', 'password'
    ];
    
    /**
     *
     * Attribute that are hidden from arrays
     *
     * @var array
     * 
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    
    
}
