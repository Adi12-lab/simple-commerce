<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\Category;
use App\Models\ProductColor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $guarded = ['id'];

    public function productImages() {
        return $this->hasMany(ProductImage::class, "product_id", "id");
    }

    public function category() {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
    public function productColors() {
        return $this->hasMany(ProductColor::class, "product_id", "id");
    }
}
