<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Prod;


class OrderItem extends Model
{
    //'quantity'

    protected $table = 'order_items';
    
    public $timestamps = false; // Disable timestamps

    protected $fillable = ['order_id', 'product_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Prod::class);
    }
}