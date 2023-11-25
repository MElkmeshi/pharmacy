<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prod;



class Cart extends Model
{


    protected $table = 'cart';
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'user_id',
        'product_id',
        'amount',
    ];

    protected $attributes = [
        'amount' => 1, // Set the default value for 'amount' to 1
    ];



    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function product()
    {
        return $this->belongsTo(Prod::class);
    }
}
