<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Prod;


class OrderItem extends Model
{
    
    protected $table = 'order_items';
    
    public $timestamps = false; 

    protected $fillable = ['order_id', 'product_id','quantity'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Prod::class);
    }
}