// app/Models/Role.php

<?php


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Order;


class Role extends Model
{
    use HasFactory;

    
    protected $table = 'roles';
    public $timestamps = false;

    protected $fillable = [
        'RoleName',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'RoleID');
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'role_pages', 'RoleID', 'PageID');
    }
}
