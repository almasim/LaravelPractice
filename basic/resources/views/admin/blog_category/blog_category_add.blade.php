@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
        <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Blog Category Add Page</h4>
                                        <form method="POST" id="myForm" action="{{ route('store.blog.category')}}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row mb-3">

                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="blog_category" id="blog_category">
                                            </div>
                                        </div>
                                        <input type="submit" value="Insert Blog Category" class="btn btn-outline-info waves-effect waves-light">
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
    $('#myForm').validate({
        rules: {
            blog_category: {
                required: true,
            },
            // blog_title:{
            //     required:true,
            // }
        },
        messages:{
            blog_category:{
                required:"Please Enter Blog Category",
            },
        },
        errorElement:'span',
        errorPlacement:function(error,element){
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight:function(element,errorClass,validClass){
            $(element).addClass('is-invalid');
        },
        unhighlight:function(element,errorClass,validClass){
            $(element).removeClass('is-invalid');
        },
    });
})
</script>

@endsection