<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_method_option_value extends Model
{
    use HasFactory;
    protected $table='payment_method_option_value';
    protected $fillable = [
        'value',
    ];
    public function values(){
        
            return $this->belongsToMany(payment_method_option::class);
        
    }
    
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
