<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

use function Symfony\Component\String\b;

class PortfolioController extends Controller
{
    public function AllPortfolio(){
        $port=Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all',compact('port'));
    }
    public function AddPortfolio(){
        return view('admin.portfolio.portfolio_add');
    }

    public function UpdatePortfolio(Request $request){
       $request->validate([
        'port_name' => 'required',
        'port_title' => 'required',
        'port_desc' => 'required',
        'port_image' => 'required'

       ],[
        'port_name.required'=>'Portfolio Name is missing',
        'port_title.required'=>'Portfolio title is missing',
        'port_desc.required'=>'Portfolio description is missing',
        'port_image.required'=>'Portfolio Image is missing',

       ]);
       $image = $request->file('port_image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
    
                Image::make($image)->resize(1020,519)->save('upload/portfolio_page/'.$name_gen);
                $save_url = 'upload/portfolio_page/'.$name_gen;
    
                Portfolio::insert([
                    'port_name' => $request->port_name,
                    'port_title' => $request->port_title,
                    'port_desc' => $request->port_desc,
                    'port_image' => $save_url,
    
                ]); 
                $notification = array(
                'message' => 'Home Slide Updated with Image Successfully', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.portfolio')->with($notification);
    

    }
    public function EditPortfolio($id){
        $port=Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit',compact('port'));

    }

    public function UpperdatePortfolio(Request $request){
        $port_id = $request->id;
        if ($request->file('port_image')) {
            $image = $request->file('port_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(636,852)->save('upload/portfolio_page/'.$name_gen);
            $save_url = 'upload/portfolio_page/'.$name_gen;

            Portfolio::findOrFail($port_id)->update([
                'port_name' => $request->port_name,
                'port_title' => $request->port_title,
                'port_desc' => $request->port_desc,
                'port_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Portfolio Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);

        } else{

            Portfolio::findOrFail($port_id)->update([
                'port_name' => $request->port_name,
                'port_title' => $request->port_title,
                'port_desc' => $request->port_desc,

            ]); 
            $notification = array(
            'message' => 'Home Slide Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi.image')->with($notification);

    }
    }
    public function DeletePortfolio($id){
        $port = Portfolio::findOrFail($id);
        $img = $port->port_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Portfolio Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function DetailsPortfolio($id){

        $port=Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('port'));

    }
    public function HomePortfolio(){
        $port=Portfolio::latest()->get();
        return view('frontend.home_all.portfolio_home',compact('port'));
    }
}
