<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Nighborhood extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name','city_id',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
