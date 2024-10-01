<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category',
        'image',
    ];

    public function products() {
        return $this->hasMany(Review::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function orders() 
    {
        return $this->belongsToMany(Order::class);
    }
}
