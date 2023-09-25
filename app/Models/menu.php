<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    public $table = 'menu';
    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'active'
    ];
    public function products()
    {
        return $this->hasMany(products::class);
    }
    public function uploadImage($image)
    {
        $imagePath = $image->store('imagesave', 'public');
        $this->image = $imagePath;
        $this->save();
    }
}
