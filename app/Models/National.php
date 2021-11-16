<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class National extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'national_number',
        'front_image',
        'back_image',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getBackImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/nations/'.$value);
        } else {
            return asset('uploads/nations/default.png');
        }
    }

    public function setBackImageAttribute($value)
    {
        if ($value)
        {
            $imageName1=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('uploads/nations/'),$imageName1);
            return $this->attributes['back_image']=$imageName1;
        }
    }

    public function getFrontImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/nations/'.$value);
        } else {
            return asset('uploads/nations/default.png');
        }
    }

    public function setFrontImageAttribute($value)
    {
        if ($value)
        {
            $imageName2=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('uploads/nations/'),$imageName2);
            return $this->attributes['front_image']=$imageName2;
        }
    }

}
