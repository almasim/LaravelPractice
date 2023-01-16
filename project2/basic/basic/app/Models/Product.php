<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');//Connect the product table to the supplier table by connecting the product.supplier_id with the supplier.id
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');//Connect the product table to the unit table by connecting the product.unite_id with the unit.id
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');//Connect the product table to the category table by connecting the product.category_id with the category.id
    }
}
