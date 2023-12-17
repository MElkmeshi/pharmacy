<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_method_options extends Model
{
    use HasFactory;
    protected $table='payment_method_options';

    protected $fillable = ['payment_method_id', 'option_id'];

    public function paymentMethod()
    {
        return $this->belongsToMany(payment_method::class);
    }
    
    public function optionsForpayment(){
        return $this->belongsToMany(options::class);
    }


    public function payment_values(){
        return $this->belongsToMany(payment_method_option_value::class);
    }

    
}
