<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');//Connect the purchase table to the supplier table by connecting the purchase.supplier_id with the supplier.id
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');//Connect the purchase table to the unit table by connecting the purchase.unit_id with the unit.id
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');//Connect the purchase table to the categiry table by connecting the purchase.category_id with the category.id
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');//Connect the purchase table to the product table by connecting the product.supplier_id with the product.id
    }
}
