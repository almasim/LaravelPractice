@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
        <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Blog Category Edit Page</h4>
                                        <form method="POST" action="{{ route('update.blog.category',$blog->id)}}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row mb-3">

                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" value="{{$blog->blog_category}}" type="text" name="blog_category" id="blog_category">
                                            @error('blog_category')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <input type="submit" value="Update Blog Category" class="btn btn-outline-info waves-effect waves-light">
                                        </form>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
        </div>
</div>


@endsection