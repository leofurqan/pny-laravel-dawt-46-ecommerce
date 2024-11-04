<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'quantity',
        'image',
        'description',
        'status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}