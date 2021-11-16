<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InvoiceOrder extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [ 
        'customer_phone',
        'invoice_id',
        'store_id',
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_phone', 'phone');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    
}
