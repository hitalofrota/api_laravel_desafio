<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    //Relacionamento de 1 para muitos (1 categoria para muitos produtos)

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
