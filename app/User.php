<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_occupation', 'user_image', 'user_role', 'status', 'e_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function posts(){
//        return $this->hasMany('App\Post');
//    }
    public function media(){
        return $this->belongsTo('App\Media' , 'user_image', 'id');
    }

    public function role(){
        return $this->belongsTo('App\Role' , 'user_role', 'id');
    }







}
