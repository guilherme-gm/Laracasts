<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{

    // Can be mass assigned
    //protected $fillable = ['title', 'body'];
    // Everything except this can be mass assigned
    protected $guarded = [];
    //
}
