<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CP extends Model 
{

    protected $table = 'client_post';
    public $timestamps = true;
    protected $fillable = ['client_id', 'post_id'];

}