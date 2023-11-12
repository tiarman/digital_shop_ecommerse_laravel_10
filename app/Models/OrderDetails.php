<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'animal_id',
        'animal_name',
        'quantity',
        'single_price',
        'subtotal_price'
    ];


    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function animal()
    {
        return $this->hasOne(Animal::class, 'id', 'animal_id');
    }
}
