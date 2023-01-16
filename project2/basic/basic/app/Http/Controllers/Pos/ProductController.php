<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Redirect With data
    public function ProductAll(){
        $unit=Unit::latest()->get();
        $category=Category::latest()->get();
        $products=Product::latest()->get();
        return view('backend.product.product_all',compact('products','unit'));
    } 
    //End

    // Redirect With data
    public function ProductAdd(){
        $unit=Unit::all();
        $category=Category::all();
        $supplier=Supplier::all();
        return view('backend.product.product_add',compact('supplier','category','unit'));
    }
    //End

    // Store into the product table
    public function ProductStore(Request $request){
        Product::insert([
            'name'=>$request->name,
            'supplier_id'=>$request->supplier_id,
            'unit_id'=>$request->unit_id,
            'category_id'=>$request->category_id,
            'quantity'=>'0',
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Product Added Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('product.all')->with($notification);
    } 
    //End

    // Redirect w data
    public function ProductEdit($id){
        $unit=Unit::all();
        $category=Category::all();
        $supplier=Supplier::all();
        $product=Product::findOrFail($id);
        return view('backend.product.product_edit',compact('product','supplier','category','unit'));
    }
    //End
    
    // Delete from product table by id
    public function ProductDelete($id){
        Product::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Product Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    //End

    // Update product table by id
    public function ProductUpdate(Request $request){
        $product_id=$request->id;
        Product::findOrFail($product_id)->update([
            'name'=>$request->name,
            'supplier_id'=>$request->supplier_id,
            'unit_id'=>$request->unit_id,
            'category_id'=>$request->category_id,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Product Updated Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('product.all')->with($notification);
    } 
    //End

}
