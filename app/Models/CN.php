<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CN extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = ['client_id', 'notification_id', 'is_read'];

}