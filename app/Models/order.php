<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $table = 'order';
    public $fillable = [
        'name',
        'email',
        'sdt',
        'items',
        'country',
        'total',
        'active'
    ];
}
