<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bank extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'customer_name',
        'address',
        'customer_number',
        'current_account_number',
        'iban',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
}
