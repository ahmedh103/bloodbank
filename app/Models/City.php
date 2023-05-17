<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model 
{
use SoftDeletes;
    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = ['name','governorate_id'];

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}