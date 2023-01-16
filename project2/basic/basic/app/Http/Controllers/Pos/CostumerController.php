<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Costumer;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CostumerController extends Controller
{
    //All Customer Redirect with data
    public function CostumerAll(){
        //$costumers=Costumer::all();
        $costumer=Costumer::latest()->get(); //getting all data from Costumer data table
        return view('backend.costumer.costumer_all',compact('costumer'));
    } 
    //All Customer End


    // Customer Add Redirect
    public function CostumerAdd(){
        return view('backend.costumer.costumer_add');
    } 
    //End


    //Customer Store 
    public function CostumerStore(Request $request){
        $img =$request->file('costumer_image');
        $name_gen=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url='upload/customer/'.$name_gen;
        Costumer::insert([
            'name'=>$request->name,
            'costumer_image'=>$save_url,
            'email'=>$request->email,
            'mobile_number'=>$request->mobile_number,
            'address'=>$request->address,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Costumer Added Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('costumer.all')->with($notification);
    } 
    //End

    //Costumer edit Redirect with data
    public function CostumerEdit($id){
        $costumer=Costumer::findOrFail($id);
        return view('backend.costumer.costumer_edit',compact('costumer'));
    } //End

    //Costumer Update  With and w/o image
    public function CostumerUpdate(Request $request){
            $costumer_id = $request->id;
            if ($request->file('costumer_image')) {
                $image = $request->file('costumer_image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  

                Image::make($image)->resize(430,372)->save('upload/costumer/'.$name_gen);
                $save_url = 'upload/costumer/'.$name_gen;

                Costumer::findOrFail($costumer_id)->update([
                    'name'=>$request->name,
                    'costumer_image'=>$save_url,
                    'email'=>$request->email,
                    'mobile_number'=>$request->mobile_number,
                    'address'=>$request->address,
                    'updated_by'=>Auth::user()->id,
                    'updated_at'=>Carbon::now(),

                ]); 
                $notification = array(
                'message' => 'Costumer Updated Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.costumer')->with($notification);
        } else{

                Costumer::findOrFail($costumer_id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'mobile_number'=>$request->mobile_number,
                    'address'=>$request->address,
                    'updated_by'=>Auth::user()->id,
                    'updated_at'=>Carbon::now(),
                    
                ]); 
                $notification = array(
                'message' => 'Costumer Updated without Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('costumer.all')->with($notification);

        } 
    }
    //End


    //Delete Customer
    public function CostumerDelete($id){
        $costumer=Costumer::findOrFail($id);
        $img=$costumer->costumer_image;
        unlink($img);

        $costumer->delete();

         $notification = array(
            'message' => 'Costumer Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    //End

    //Customer Credit Redirect with data
    public function CostumerCredit(){
        $allData=Payment::whereIn('paid_status',['full_due','partial_paid'])->get();  //Take only specific data from table - take only the "full_due" and "partial_paid" from the paid status row (there are other valeus too but i only need these 2 thats when you use whereIn)
        return view('backend.costumer.costumer_credit',compact('allData'));
    }
    //End

    //Customer Credit Redirect with data
    public function CostumerPrint(){
        $allData=Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
       return view('backend.pdf.costumer_credit_pdf',compact('allData')); 
    }
    //End

    //Customer Edit Invoice Redirect with data
    public function CostumerEditInvoice($invoice_id){
        $payment=Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.costumer.costumer_edit_invoice',compact('payment')); 
    }
    //End

    //Update Invoice     If not more than the requested amount and if full paid selected update like below or partial paid selected add the amount
    public function CostumerUpdateInvoice(Request $request, $invoice_id){
         //start if 
        if($request->new_paid_amount > $request->paid_amount){
            $notification = array(
                'message' => 'You cant pay more than you owe', 
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        } else{ //start else
            $payment=Payment::where('invoice_id',$invoice_id)->first();
            $payment_details=new PaymentDetail();
            
            $payment->paid_status=$request->paid_status;

            //start if
            if($request->paid_status=="full_paid"){
                $payment->paid_amount=Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                $payment->due_amount='0';
                $payment_details->current_paid_amount=$request->new_paid_amount;
            }
            elseif($request->paid_status=="partial_paid"){
                $payment->paid_amount=Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount=Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount=$request->paid_amount;

            }
            //end if

            $payment->save();
            $payment_details->invoice_id=$request->invoice_id;
            $payment_details->date=date('Y-m-d',strtotime($request->date));
            $payment_details->updated_by=Auth::user()->id;
            $payment_details->save();

            //notification
            $notification = array(
                'message' => 'Costumer Invoice Updated Successfully', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('costumer.credit')->with($notification);
            //end notification 
        } 
        //end else,If
    }
    //end

    // CostumerDetailsPdf Redirect With Data
    public function CostumerDetailsPdf($invoice_id){
        $payment=Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pdf.invoice_details_pdf',compact('payment'));
    }
    //End

    // CostumerPaid Redirect with Data
    public function CostumerPaid(){
        $allData=Payment::where('paid_status','!=','full_due')->get();
        return view('backend.costumer.costumer_paid',compact('allData'));
    }
    //End

    // CostumerPaidPrintPdf Redirect With Data
    public function CostumerPaidPrintPdf(){
        $allData=Payment::where('paid_status','!=','full_due')->get();
        return view('backend.pdf.costumer_paid_pdf',compact('allData'));
    }
    //End

    // CostumerWiseReport Redirect with Data
    public function CostumerWiseReport(){
        $costumers = Costumer::all();
        return view('backend.costumer.costumer_wise_report',compact('costumers'));
    }
    //End

    // CreditWisePdf Redirect with Data
    public function CreditWisePdf(Request $request){
        $allData=Payment::where('costumer_id',$request->customer_id)->where('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.credit_costumer_pdf',compact('allData'));
    }
    //End

    // PaidWisePdf Redirect with Data
    public function PaidWisePdf(Request $request){
        $allData=Payment::where('costumer_id',$request->customer_id)->where('paid_status',['full_paid','partial_paid'])->get();
        return view('backend.pdf.paid_costumer_pdf',compact('allData'));
    }
    //End
}
