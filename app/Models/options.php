<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class options extends Model
{
    use HasFactory;
    protected $table='options';

   protected $fillable=[
     'name',
     'type',
   ];
   public function options() {
   
      return $this->hasMany(payment_method_options::class);
    

   }
}
