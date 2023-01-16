<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Costumer;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    // Getting all invoices that has the status 1
    public function InvoiceAll(){
        $allData =Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get(); /// orderBy
        return view('backend.invoice.invoice_all',compact('allData'));
    } 
    //End


    // Redirect w data
    public function InvoiceAdd(){
            $category=Category::all();
            $costumer=Costumer::all();
            $invoice_data=Invoice::orderBy('id','desc')->first();
            if ($invoice_data==null) {
                $firstReg='0';
                $invoice_number=$firstReg+1;
            } else {
                $invoice_data=Invoice::orderBy('id','desc')->first()->invoice_number;
                $invoice_number=$invoice_data+1;
            }
            $date=date('Y-m-d');
            return view('backend.invoice.invoice_add',compact('category','invoice_number','date','costumer'));
    }
    //End


    // Store the New invoice with multi table storing 
    public function InvoiceStore(Request $request){
    if($request->category_id == null){ //if 1 start
        $notification = array(
            'message' => 'Sorry You do not select any item', 
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } else { //if 1 end || else 1 start  
        if($request->paid_amount > $request->estimated_amount){ //if2 start
            $notification = array(
                'message' => 'Paid amount is more then required', 
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);

        } else { // if 2 end || else 2 start
            $invoice=new Invoice();
            $invoice->invoice_number=$request->invoice_number;
            $invoice->date=date('Y-m-d',strtotime($request->date));
            $invoice->desc=$request->desc;
            $invoice->status='0';
            $invoice->created_by=Auth::user()->id;
            DB::transaction(function() use($request,$invoice){
                if($invoice->save()){ //if 3 start
                    $count_category=count($request->category_id);
                    for ($i=0; $i < $count_category; $i++) { //for start

                        $invoice_detail= new InvoiceDetails();
                        $invoice_detail->date=date('Y-m-d',strtotime($request->date));
                        $invoice_detail->invoice_id=$invoice->id;
                        $invoice_detail->category_id=$request->category_id[$i];
                        $invoice_detail->product_id=$request->product_id[$i];
                        $invoice_detail->selling_qty=$request->selling_qty[$i];
                        $invoice_detail->unit_price=$request->unit_price[$i];
                        $invoice_detail->selling_price=$request->selling_price[$i];
                        $invoice_detail->status='0';
                        $invoice_detail->save();

                    } // for end
                    if($request->costumer_id=='0'){ //if 4 start
                        $costumer= new Costumer();
                        $costumer->name=$request->name;
                        $costumer->mobile_number=$request->mobile_number;
                        $costumer->email=$request->email;
                        $costumer->save();
                        $costumer_id=$costumer->id; 
                    } else { //if 4 end || else 4 start
                        $costumer_id=$request->costumer_id;
                    }//else 4 end
                    $payment=new Payment();
                    $payment_details = new PaymentDetail();
                    $payment->invoice_id = $invoice->id;
                    $payment->costumer_id =$costumer_id;
                    $payment->discount_amount = $request->discount_amount;
                    $payment->total_amount = $request->estimated_amount;
                    $payment->paid_status = $request->paid_status;
                    if($request->paid_status=='full_paid'){
                        $payment->paid_amount=$request->estimated_amount;
                        $payment->due_amount='0';
                        $payment_details->current_paid_amount=$request->estimated_amount;
                    }elseif($request->paid_status=='full_due'){
                        $payment->paid_amount='0';
                        $payment->due_amount=$request->estimated_amount;
                        $payment_details->current_paid_amount='0';
                    }elseif(($request->paid_status=='partial_paid')){
                        $payment->paid_amount=$request->paid_amount;
                        $payment->due_amount=$request->estimated_amount-$request->paid_amount;
                        $payment_details->current_paid_amount=$request->paid_amount;
                    }
                    $payment->save();
                    $payment_details->invoice_id=$invoice->id;
                    $payment_details->date=date('Y-m-d',strtotime($request->date));
                    $payment_details->save();
                }//if 3 end
                
            });

            }//end else 2
            
        }//end else 1
        $notification = array(
            'message' => 'Invoice Data inserted succefully', 
            'alert-type' => 'succes'
        );

        return redirect()->route('invoice.pending')->with($notification);
    }
    //End

    // Redirect w data only where status is 0
    public function InvoicePending(){
        $allData =Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get(); /// orderBy
        return view('backend.invoice.invoice_pending',compact('allData'));
    }
     //End

     //Multi table Delete by id
    public function InvoiceDelete($id){
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        InvoiceDetails::where('invoice_id',$invoice->id)->delete(); 
        Payment::where('invoice_id',$invoice->id)->delete();
        PaymentDetail::where('invoice_id',$invoice->id)->delete();
        $notification = array(
            'message' => 'Invoice Data Deleted succefully', 
            'alert-type' => 'succes'
        );
        return redirect()->back()->with($notification);
    }
    //End

    // Redirect w data
    public function InvoiceApprove($id){
        $invoice=Invoice::with('invoice_details')->findOrFail($id);
        return view('backend.invoice.invoice_approve',compact('invoice'));
    }
    //End

    // Approve the Invoice
    public function ApprovalStore(Request $request,$id){
        foreach($request->selling_qty as $key => $val){
            $invoice_details = InvoiceDetails::where('id',$key)->first();
            $product = Product::where('id',$invoice_details->product_id)->first();
            if($product->quantity > $request->selling_qty){
                $notification = array(
                    'message' => 'Approve Maximum Value', 
                    'alert-type' => 'error'
                );
            
                return redirect()->back()->with($notification);
            }//end if
        }//end foreach

        $invoice= Invoice::findOrFail($id);
        $invoice->updated_by=Auth::user()->id;
        $invoice->status='1';

        DB::transaction(function() use($request,$invoice,$id){
            foreach($request->selling_qty as $key => $val){
                $invoice_detail = InvoiceDetails::where('id',$key)->first();
                $invoice_detail->status='1';
                $product = Product::where('id',$invoice_detail->product_id)->first();
                $product->quantity=((float)$product->quantity)-((float)$request->selling_qty[$key]);
                $product->save();
            }//endforeach
            $invoice->save();
        });
        $notification = array(
            'message' => 'Invoice Approved', 
            'alert-type' => 'success'
        );
        
            return redirect()->route('invoice.pending')->with($notification);
    }
    //End

    // Redirect w data
    public function InvoicePrintList(){
        $allData =Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get(); /// orderBy
        return view('backend.invoice.invoice_print',compact('allData'));
    }
    //End

    // Redirect w data
    public function InvoicePrint($id){
        $invoice = Invoice::with('invoice_details')->findOrFail($id);
        return view('backend.pdf.invoice_pdf',compact('invoice'));
    }
    //End

    // Redirect
    public function InvoiceDailyReport(){
        return view('backend.invoice.invoice_daily_report');
    }
    //End

    //Redirect w data
    public function InvoiceDailyPdf(Request $request){
        $sdate=date('Y-m-d',strtotime($request->start_date));
        $edate=date('Y-m-d',strtotime($request->end_date));
        $allData=Invoice::whereBetween('date',[$sdate,$edate])->where('status','1')->get();

        $start_date=date('Y-m-d',strtotime($request->start_date));
        $end_date=date('Y-m-d',strtotime($request->end_date));
        return view('backend.pdf.invoice_report_pdf',compact('allData','start_date','end_date'));
    }
    //End

}
  
