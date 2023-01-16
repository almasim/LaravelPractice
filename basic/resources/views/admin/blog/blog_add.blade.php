@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
        <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Blog Page</h4>
                                        <form method="POST" action="{{ route('store.blog')}}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row mb-3">

                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="blog_catgory_id" aria-label="Default select example">
                                                    @foreach ($catagories as $item)
                                                    <option value="{{$item->id}}">{{$item->blog_category}}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="blog_title" id="blog_title" type="text" >
                                                @error('blog_title')
                                                <span class="text-danger">{{$messege}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="blog_tags" value="home,tech" data-role="tagsinput" type="text" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                            <div class="col-sm-10">
                                                <textarea id="elm1" name="blog_desc" ></textarea>
                                                @error('blog_desc')
                                                <span class="text-danger">{{$messege}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3 ">
                                            <label for="example-text-input" class="col-sm-2 mt-4 col-form-label">Blog Image</label>
                                            <div class="col-sm-1">
                                                <img class="rounded avatar-lg" id="blog_image" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                                @error('blog_image')
                                                <span class="text-danger">{{$messege}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-9 mt-4">
                                                <input class="form-control" type="file" name="blog_image" id="image">
                                            </div>
                                        </div>
                                        <input type="submit" value="Insert blog data" class="btn btn-outline-info waves-effect waves-light">
                                        </form>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
        </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader= new FileReader();
            reader.onload=function(e){
                $('#home_slide').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>

@endsection