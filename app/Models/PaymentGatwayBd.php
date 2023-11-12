<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatwayBd extends Model
{
    use HasFactory;
    protected $table = 'payment_getway_bd';
    protected $fillable = [
        'gateway_name',
        'store_id',
        'signature_key',
        'status',
    ];


}
