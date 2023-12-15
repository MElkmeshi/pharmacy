<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_method extends Model
{
    use HasFactory;
    protected $table = 'payment_method';

    protected $fillable = [
        'name',
    ];

    public function manypayments()
    {
        return $this->hasMany(payment_method_options::class);
    }
    

}
