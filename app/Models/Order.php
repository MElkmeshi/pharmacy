<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'status', 'address'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}