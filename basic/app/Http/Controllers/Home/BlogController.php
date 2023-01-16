<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    //
    public function AllBlog(){
        $blog=Blog::latest()->get();
        return view('admin.blog.blog_all',compact('blog'));
    }

    public function AddBlog(){
        $catagories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.blog_add',compact('catagories'));
    }

    public function StoreBlog(Request $request){
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(430,372)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;
        Blog::insert([
            'blog_catgory_id' => $request->blog_catgory_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_desc' => $request->blog_desc,
            'blog_image' => $save_url,
            'created_at'=> Carbon::now()

        ]); 
        $notification = array(
        'message' => 'Home Slide Updated with Image Successfully', 
        'alert-type' => 'success'
    );

    return redirect()->route('all.blog')->with($notification);
    }

    public function Editblog($id){
        $blogs=Blog::findOrFail($id);
        $catagories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.blog_edit',compact('blogs','catagories'));
    }
    public function UpdateBlog(Request $request){
        $blog_id = $request->id;
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(430,372)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_catgory_id' => $request->blog_catgory_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_desc' => $request->blog_desc,
                'blog_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Blog Updated Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
    } else{

            Blog::findOrFail($blog_id)->update([
                'blog_catgory_id' => $request->blog_catgory_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_desc' => $request->blog_desc,
                
            ]); 
            $notification = array(
            'message' => 'Blog Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);

        }
    }

    public function Deleteblog($id){
        $port = Blog::findOrFail($id);
        $img = $port->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Portfolio Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DetailsBlog($id){
        $allblogs =Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $blogs =Blog::findOrFail($id);
        return view('frontend.blog_details',compact('blogs','allblogs','categories'));
    }
    public function CategoryBlog($id){
        $blogpost =Blog::where('blog_catgory_id',$id)->orderBy('id','DESC')->get();
        $allblogs =Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $catname=BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details',compact('blogpost','allblogs','categories','catname'));
    }

    public function HomeBlog(){
        $allblogs=Blog::latest()->paginate(3);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog',compact('allblogs','categories'));
    }
}
