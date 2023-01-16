<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function costumer(){
        return $this->belongsTo(Costumer::class,'costumer_id','id'); //Connect the payment table to the costumer table by connecting the payment.costumer_id with the costumer.id
    }
    
    public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id','id'); //Connect the payment table to the invoice table by connecting the payment.invoice_id with the invoice.id
    }
}
