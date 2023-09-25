<?php

namespace App\Models;

use App\Models\cart;
use App\Models\menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    public $table = 'products';
    public function menu()
    {
        return $this->belongsTo(menu::class);
    }
    public function cart()
    {
        return $this->hasMany(cart::class);
    }
    public $fillable = [
        'name',
        'image',
        'price',
        'description',
        'menu_id',
        'saleoff',
        'active'
    ];
}
