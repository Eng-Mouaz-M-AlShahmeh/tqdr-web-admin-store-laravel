<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User  as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'avatar', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }

    // public function getJWTCustomClaims()
    // {
    //     return [];
    // }
    
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/user/'.$value);
        } else {
            return asset('uploads/user/default.png');
        }
    }

    public function setImageAttribute($value)
    {
        if ($value)
        {
            $imageName=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('uploads/user/'),$imageName);
            return $this->attributes['avatar']=$imageName;
        }
    }
    
}