<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BTC extends Model 
{

    protected $table = 'blood_type_client';
    public $timestamps = true;
    protected $fillable = ['blood_type_id', 'client_id'];

}