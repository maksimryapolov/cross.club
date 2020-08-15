<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = ['product_id', 'size', 'price'];
    public const SIZES = [36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46];

    public function Products()
    {
        return $this->belongsTo(Product::class);
    }

    static public function getInfo()
    {
        return self;
    }

}
