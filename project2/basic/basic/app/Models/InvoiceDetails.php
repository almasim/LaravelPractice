<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    public function product(){///Connect the invoicedetails table to the Product table by connecting the invoiceDetails.product_id with the product.id
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');//Connect the invoicedetails table to the Product table by connecting the invoiceDetails.category_id with the category.id
    }
}
