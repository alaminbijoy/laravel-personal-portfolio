<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social_Media extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'social_media_name', 'social_media_url', 'icon', 'media_id',
    ];

    public function media(){
        return $this->belongsTo('App\Media');
    }

}
