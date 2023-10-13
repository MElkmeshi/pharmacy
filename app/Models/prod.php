<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;



class prod extends Model
{
   // use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'products';
    
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'name',
        'desciption',
        'price',
        'image',
    ];

  
}
