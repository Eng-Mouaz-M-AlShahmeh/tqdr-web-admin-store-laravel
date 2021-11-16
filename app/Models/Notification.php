<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'details',
        'account_type',
        'is_seen',
        'seen_at',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

}
