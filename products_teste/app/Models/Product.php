<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'status',
        'image',
        'category_id'
    ];

    //Relacionamento de 1 para 1 (1 produto para 1 categoria)

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
