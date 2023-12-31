<?php

namespace App\Models;

use App\Models\Color;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = "product_colors";

    protected $guarded = ["id"];

    public function color() {
        return $this->belongsTo(Color::class, "color_id", "id");
    }
}
