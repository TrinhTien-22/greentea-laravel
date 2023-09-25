<?php

namespace App\Models;

use App\Models\cart;
use App\Models\comments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class userhomes extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function cart()
    {
        return $this->hasMany(cart::class);
    }
    public function comments()
    {
        return $this->hasMany(comments::class);
    }
}
