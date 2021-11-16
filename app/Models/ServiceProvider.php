<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class ServiceProvider extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [ 
        'username',
        'password',
        'first_name',
        'last_name',
        'phone',
        'email',
        'avatar',
        'tqdr_service_price', 
        'tqdr_service_vat_percentage',
        'profit_percentage',
        'profit_fixed_amount',
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

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/images/'.$value);
        } else {
            return asset('uploads/images/avatar.png');
        }
    }

    public function setImageAttribute($value)
    {
        if ($value)
        {
            $imageName=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('uploads/images/'),$imageName);
            return $this->attributes['avatar']=$imageName;
        }
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

   


}
