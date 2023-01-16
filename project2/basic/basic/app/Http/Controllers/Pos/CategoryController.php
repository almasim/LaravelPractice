<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //Redirect with Data
    public function CategoryAll(){
        //$categorys=Category::all();
        $categorys=Category::latest()->get(); //getting all data from category data table
        return view('backend.category.category_all',compact('categorys'));
    } 
    //End

    //Redirect with Data
    public function CategoryAdd(){
        return view('backend.category.category_add');
    } 
    //End

    // Store data in the Category Table
    public function CategoryStore(Request $request){
        Category::insert([
            'name'=>$request->name,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Category Added Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('category.all')->with($notification);
    } 
    //End

    //Redirect with Data
    public function CategoryEdit($id){
        $category=Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    } 
    //End
    
    // Delete Category By Id
    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Category Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    //End
    
    // Update Category By ID
    public function CategoryUpdate(Request $request){
        $category_id=$request->id;
        Category::findOrFail($category_id)->update([
            'name'=>$request->name,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('category.all')->with($notification);
    } 
    //End
}
