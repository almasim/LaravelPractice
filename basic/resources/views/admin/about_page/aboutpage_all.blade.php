@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
        <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">About Page</h4>
                                        <form method="POST" action="{{ route('update.about')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $about->id}}">
                                        <div class="row mb-3">

                                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="title" value="{{ $about->title }}" id="title">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Desc</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="short_desc" id="short_desc" required rows="5">{{ $about->short_desc }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Long Desc</label>
                                            <div class="col-sm-10">
                                                <textarea id="elm1" name="long_desc" >{{ $about->long_desc }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3 ">
                                            <label for="example-text-input" class="col-sm-2 mt-4 col-form-label">About Image</label>
                                            <div class="col-sm-1">
                                                <img class="rounded avatar-lg" id="about_image" src="{{ (!empty($about->about_image)) ? url($about->about_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                            </div>
                                            <div class="col-sm-9 mt-4">
                                                <input class="form-control" type="file" name="about_image" id="image">
                                            </div>
                                        </div>
                                        <input type="submit" value="Update About" class="btn btn-outline-info waves-effect waves-light">
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