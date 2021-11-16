<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

// use App\Models\Country;
// use App\Models\City;
// use App\Models\Nighborhood;
// use App\Models\Store;

class Address extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'building_number',
        'street_name',
        'postal_code',
        'longitude',
        'latitude',
        'zoom',
        'country_id',
        'city_id',
        'nighborhood_id',
        'store_id',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function nighborhood()
    {
        return $this->belongsTo(Nighborhood::class, 'nighborhood_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

}
