<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{
    public function SupplierAll(){
        //$suppliers=Supplier::all();
        $suppliers=Supplier::latest()->get(); //getting all data from supplier data table
        return view('backend.supplier.supplier_all',compact('suppliers'));
    } //End

    public function SupplierAdd(){
        return view('backend.supplier.supplier_add');
    } //End

    // Store Data into the supplier table
    public function SupplierStore(Request $request){
        Supplier::insert([
            'name'=>$request->name,
            'mobile_number'=>$request->mobile_number,
            'email'=>$request->email,
            'address'=>$request->address,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Supplier Added Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('supplier.all')->with($notification);
    } 
    //End

    // Redirect With data
    public function SupplierEdit($id){
        $supplier=Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('supplier'));
    }
    //End
    
    // Delete from supplier table by id
    public function SupplierDelete($id){
        Supplier::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Supplier Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    //End
    
    // Update supplier table by id
    public function SupplierUpdate(Request $request){
        $supplier_id=$request->id;
        Supplier::findOrFail($supplier_id)->update([
            'name'=>$request->name,
            'mobile_number'=>$request->mobile_number,
            'email'=>$request->email,
            'address'=>$request->address,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Supplier Updated Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('supplier.all')->with($notification);
    } 
    //End
}
