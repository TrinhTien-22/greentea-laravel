<?php

namespace App\Models;

use App\Models\userhomes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    public $table  = 'comments';
    public function userhomes()
    {
        return $this->belongsTo(userhomes::class);
    }
    public $fillable = [
        'name',
        'product_id',
        'rate',
        'content'
    ];
}
