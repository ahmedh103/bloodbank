<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;



    public $timestamps = true;
    protected $fillable = ['token', 'type', 'client_id'];

    public function clients()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
