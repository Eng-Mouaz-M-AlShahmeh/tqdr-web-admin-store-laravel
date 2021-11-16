<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Models\ServiceProvider;

class Invoice extends Model  
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'amount',
        'remaining_amount',
        'is_paid',
        'service_provider_id',
        'status',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id');
    }

}
