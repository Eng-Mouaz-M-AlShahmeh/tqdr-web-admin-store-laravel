<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User  as Authenticatable;

class Store extends Authenticatable
{
    use HasFactory, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'password',
        'phone',
        'email',
        'logo',
        'cover_image',
        'store_name',
        'web_url',
        'description',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getLogoAttribute($value)
    {
        if ($value) {
            return asset('uploads/stores/'.$value);
        } else {
            return asset('uploads/stores/default.png');
        }
    }

    public function setLogoAttribute($value)
    {
        if ($value)
        {
            $imageName1=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('uploads/stores/'),$imageName1);
            return $this->attributes['logo']=$imageName1;
        }
    }

    public function getCoverAttribute($value)
    {
        if ($value) {
            return asset('uploads/stores/'.$value);
        } else {
            return asset('uploads/stores/default.png');
        }
    }

    public function setCoverAttribute($value)
    {
        if ($value)
        {
            $imageName2=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('uploads/stores/'),$imageName2);
            return $this->attributes['cover_image']=$imageName2;
        }
    }

    // public function getImageAttribute($value)
    // {
    //     if ($value) {
    //         return asset('uploads/stores/'.$value);
    //     } else {
    //         return asset('uploads/stores/default.png');
    //     }
    // }

    // public function setImageAttribute($value)
    // {
    //     if ($value)
    //     {
    //         $imageName=time().'.'.$value->getClientOriginalExtension();
    //         $value->move(public_path('uploads/stores/'),$imageName);
    //         return $this->attributes['logo']=$imageName;
    //     }
    // }


    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function socialLinks()
    {
        return $this->belongsTo(SocialLinks::class, 'social_links_id');
    }

    public function cr()
    {
        return $this->belongsTo(CommercialRegister::class, 'cr_id');
    }

    public function national()
    {
        return $this->belongsTo(National::class, 'national_id');
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'store_id');
    }

}
