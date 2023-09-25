<?php

namespace App\Models;

use App\Models\products;
use App\Models\userhomes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class cart extends Model
{
    use HasFactory;
    public $table = 'cart';
    public function userhome()
    {
        return $this->belongsTo(userhomes::class, 'email_user', 'email');
    }
    public function product()
    {
        return $this->belongsTo(products::class);
    }

    public $fillable = [
        'product_id',
        'quantity',
        'email_user'
    ];
}
