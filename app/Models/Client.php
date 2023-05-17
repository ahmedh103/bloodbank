<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Client extends Authenticatable 
{
    


    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = ['phone', 'email', 'name','city_id', 'password', 'blood_type_id','last_donation_date', 'd_o_b','pin_code','status'];

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function client_governorates()
    {
        return $this->hasMany('App\Models\Governorate');
    }

    public function bloodtypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function tokens()
    {
    return $this->hasMany('App\Models\Token');
    }


    protected $hidden = [
        'password',
        'api_token',
    ];

}