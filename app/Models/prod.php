<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;



class Prod extends Model
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
        'category',
    ];


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function froms()
    {
        return $this->hasMany(Chat::class);
    }

    public function tos()
    {
        return $this->hasMany(Chat::class);
    }



}
