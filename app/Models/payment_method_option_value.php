<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_method_option_value extends Model
{
    use HasFactory;
    protected $table='payment_method_option_value';
    protected $primaryKey = 'id';
    protected $fillable = [
        'paymentMethodoptionId',
        'value',
        'userId',
    ];
    
   // public function values(){
        
          //  return $this->belongsTo(payment_method_options::class,'paymentMethodoptionId');
   // }
    
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
