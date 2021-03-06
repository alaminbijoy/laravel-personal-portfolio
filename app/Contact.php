<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
