<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'country_id',
        'name',
        'flag',
        'phone_code',
        'iso_2code',
        'iso_3code',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/countries/'.$value);
        } else {
            return asset('uploads/countries/flag.png');
        }
    }

    public function setImageAttribute($value)
    {
        if ($value)
        {
            $imageName=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('uploads/countries/'),$imageName);
            return $this->attributes['flag']=$imageName;
        }
    }
    
}
