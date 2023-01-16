@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
        <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">About Images</h4>
                                        <form method="POST" action="{{ route('update.multi.image')}}" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$multiImage->id}}">
                                        <div class="row mb-3 ">
                                            <label for="example-text-input" class="col-sm-2 mt-4 col-form-label">About Multi Image</label>
                                            <div class="col-sm-1">
                                                <img class="rounded avatar-lg" id="multi_image" src="{{ asset($multiImage->title) }}" alt="Card image cap">
                                            </div>
                                            <div class="col-sm-9 mt-4">
                                                <input class="form-control" type="file" name="multi_image" id="image" >
                                            </div>
                                        </div>
                                        <input type="submit" value="Update Multi Image" class="btn btn-outline-info waves-effect waves-light">
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