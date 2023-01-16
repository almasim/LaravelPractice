<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Redirect With data
    public function StockReport(){
        $allData = Product::orderBy('supplier_id','ASC')->orderBy('category_id','ASc')->get();
        return view('backend.stock.stock_report',compact('allData'));
    }
    //End

    // Redirect With data
    public function StockReportPdf(){
        $allData = Product::orderBy('supplier_id','ASC')->orderBy('category_id','ASc')->get();
        return view('backend.pdf.stock_report_pdf',compact('allData'));
    }
    //End

    // Redirect With data
    public function StockSPWise(){
        $suppliers=Supplier::all();
        $category=Category::all();
        return view('backend.stock.supplier_product_wise_report',compact('suppliers','category'));
    }
    //End

    // Redirect With data
    public function SupplierWisePdf(Request $request){
        $allData = Product::orderBy('supplier_id','ASC')->orderBy('category_id','ASc')->where('supplier_id',$request->supplier_id)->get();
        return view('backend.pdf.supplier_wise_pdf',compact('allData'));
    }
    //End

    // Redirect With data
    public function ProductWisePdf(Request $request){
        $product = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        return view('backend.pdf.product_wise_pdf',compact('product'));
    }
    //End

}
