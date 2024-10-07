<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Define the table associated with the model if it's different from the default
    protected $table = 'products';

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'product_code', 'product_name', 'product_sku', 'product_details', 'product_price', 
        'product_quantity', 'product_category', 'product_brand', 
        'product_status', 'product_weight', 'product_dimensions', 'product_color', 
        'product_size', 'product_image'
    ];

    // Optionally, define any relationships
    public function category()
    {
        return $this->belongsTo(Category::class, 'product_category_id');
    }

    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'product_brand_id');
    }
}
