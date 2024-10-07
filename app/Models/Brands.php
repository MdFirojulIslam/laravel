<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $table = 'brands';

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'brand_name',
        'brand_description',
        'brand_logo',
    ];
}
