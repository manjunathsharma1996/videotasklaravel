<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'description'
    ];

}
