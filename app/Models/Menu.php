<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'url', 'parent_id','required_role',
    ];

    // Define a relationship to represent parent-child relationships
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
