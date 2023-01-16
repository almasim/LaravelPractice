<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    public function payment(){ ///Connect the invoice table tp the payment table by connecting the payment.invoice_id and the invoice.id
        return $this->belongsTo(Payment::class,'id','invoice_id');
    }
    public function invoice_details(){
        // One To many Connection
        return $this->hasMany(InvoiceDetails::class,'invoice_id','id');///Connect the invoice table tp the Invoice details table by connecting the InvoiceDetails.invoice_id and the invoice.id

    }
}
