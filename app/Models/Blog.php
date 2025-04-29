<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     // Allow mass assignment for these fields
     //means automatically filling multiple fields at once using an array
     protected $fillable = [ 
        'title', 
        'description',
        'image',
    ];
}
