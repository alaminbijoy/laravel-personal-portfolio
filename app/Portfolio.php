<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'portfolio_title', 'portfolio_content', 'media_id', 'status', 'category_name', 'tag_id',
    ];

    protected $dates = ['deleted_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function media(){
        return $this->belongsTo('App\Media');
    }

    public function cat(){
        return $this->belongsTo('App\Category' , 'category_name', 'id');
    }
}
