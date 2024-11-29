<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relasi dengan model Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
