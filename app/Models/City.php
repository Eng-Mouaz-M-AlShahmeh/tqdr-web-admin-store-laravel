<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class City extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
