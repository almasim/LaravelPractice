<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    // Redirect With data
    public function UnitAll(){
        //$units=Unit::all();
        $units=Unit::latest()->get(); //getting all data from unit data table
        return view('backend.unit.unit_all',compact('units'));
    } 
    //End

    // Redirect 
    public function UnitAdd(){
        return view('backend.unit.unit_add');
    } //End

    // Add to the unit table
    public function UnitStore(Request $request){
        Unit::insert([
            'name'=>$request->name,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Unit Added Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('unit.all')->with($notification);
    } 
    //End

    // Redirect With data
    public function UnitEdit($id){
        $unit=Unit::findOrFail($id);
        return view('backend.unit.unit_edit',compact('unit'));
    } //End
    
    //Delete unit by id
    public function UnitDelete($id){
        Unit::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Unit Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    //End
    
    //Update unit table by id
    public function UnitUpdate(Request $request){
        $unit_id=$request->id;
        Unit::findOrFail($unit_id)->update([
            'name'=>$request->name,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Unit Updated Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('unit.all')->with($notification);
    } //End
}
