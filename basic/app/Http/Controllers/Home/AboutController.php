<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;


class AboutController extends Controller
{
    //
    public function AboutPage(){
        $about= About::find(1);
        return view('admin.about_page.aboutpage_all',compact('about'));
    }

    public function UpdateAbout(Request $request){
        $about_id = $request->id;
        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(523,605)->save('upload/about_page/'.$name_gen);
            $save_url = 'upload/about_page/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'about_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'About Page Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } else{

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,

            ]); 
            $notification = array(
            'message' => 'About Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end Else
    }
    
    public function HomeAbout(){
        $about= About::find(1);
        return view('frontend.about_page',compact('about'));
    }

    public function AboutMulti(){
            return view('admin.about_page.multi_image');
    }
    public function StoreMultiImages(Request $request){
        $image=$request->file('multi_image');
        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;
            MultiImage::insert([
                'title' => $save_url,
                'created_at'=>Carbon::now()

        ]);}//end foreach

            $notification = array(
            'message' => 'Multi Image Image Successfully uploaded', 
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    }

    public function AllMulti(){
        $allMulti= MultiImage::all();
        return(view('admin.about_page.all_multiimage',compact('allMulti')));
    }
    public function EditMulti($id){
        $multiImage=MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi',compact('multiImage'));
    }
    public function UpdateMultiImages(Request $request){
        $multi_image_id = $request->id;
        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(523,605)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                'title' => $save_url
            ]); 
            $notification = array(
            'message' => 'Multi Image Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi.image')->with($notification);

        } 

    }
    public function DeleteMultiImage($id){

        $multi = MultiImage::findOrFail($id);
        $img = $multi->title;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Multi Image Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
