<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SocialLinks extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

}
