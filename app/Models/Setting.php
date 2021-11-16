<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [  
        'title',
        'main_dsc',
        'tqdr_logo',
        'about',
        'privacy',
        'terms',
        'admin_phone',
        'admin_email',
        'admin_periods',
        'admin_copyright',
        'admin_twitter',
        'admin_facebook',
        'admin_google_plus',

        'header_email',
        'smtp_host',
        'smtp_port',
        'email_encription',
        'smtp_user',
        'smtp_pass',
        'api_key',
        
       
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/settings/'.$value);
        } else {
            return asset('uploads/settings/default.png');
        }
    }

    public function setImageAttribute($value)
    {
        if ($value)
        {
            $imageName=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('uploads/settings/'),$imageName);
            return $this->attributes['tqdr_logo']=$imageName;
        }
    }

}
