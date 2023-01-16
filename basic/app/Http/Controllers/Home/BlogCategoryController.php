<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){
        $blogcategory=BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all',compact('blogcategory'));
    }

    public function AddBlogCategory(){
        return view('admin.blog_category.blog_category_add'); //we dont pass any data so no need for compact
    }


    public function StoreBlogCategory(Request $request){
        $request->validate([
            'blog_category' => 'required',
    
           ],[
            'blog_category' =>'Blog Category Name is missing',
    
           ]);
                    BlogCategory::insert([
                        'blog_category' => $request->blog_category,
        
                    ]); 
                    $notification = array(
                    'message' => 'Blog category Upload Successfull', 
                    'alert-type' => 'success'
                );
        
                return redirect()->route('all.blog.category')->with($notification);
        
    
        }

    public function EditBlogCategory($id){
        $blog=BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit',compact('blog'));
    }
        
    public function UpdateBlogCategory(Request $request,$id){
        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,

        ]); 
        $notification = array(
        'message' => 'Blog category Updated Successfull', 
        'alert-type' => 'success'
    );

    return redirect()->route('all.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id){
        $blog = BlogCategory::findOrFail($id);
        BlogCategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Portfolio Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
