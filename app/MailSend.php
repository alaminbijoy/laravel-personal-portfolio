<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailSend extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email', 'subject', 'message',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
