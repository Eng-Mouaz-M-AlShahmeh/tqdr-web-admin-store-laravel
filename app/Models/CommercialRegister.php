<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CommercialRegister extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'commercial_name',
        'commercial_number',
        'commercial_type',
        'unified_number_of_facility',
        'facility_type',
        'cr_state',
        'authorized_entity_for_activity',
        'activity',
        'netaqat_cirtificate',
        'zaqat_certificate',
        'chamber_of_commerce_subscription',
        'municipal_license',
        'expired_at',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
}
