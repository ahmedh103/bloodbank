<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CG extends Model 
{

    protected $table = 'client_governorate';
    public $timestamps = true;
    protected $fillable = ['client_id', 'governorate_id'];

}