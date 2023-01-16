@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
        <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Portfolio Edit Page</h4>
                                        <form method="POST" action="{{ route('upperdate.portfolio')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $port->id }}">
                                        <div class="row mb-3">

                                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="port_name" value="{{ $port->port_name }}" id="port_name">
                                                @error('port_name')
                                                <span class="text-danger">{{$messege}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" value="{{ $port->port_title}}" name="port_title" id="port_title" type="text" >
                                                @error('port_title')
                                                <span class="text-danger">{{$messege}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                                            <div class="col-sm-10">
                                                <textarea id="elm1" name="port_desc" >{!! $port->port_desc !!}</textarea>
                                                @error('portfolio_desc')
                                                <span class="text-danger">{{$messege}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3 ">
                                            <label for="example-text-input" class="col-sm-2 mt-4 col-form-label">Portfolio Image</label>
                                            <div class="col-sm-1">
                                                <img class="rounded avatar-lg" id="port_image" src="{{ asset($port->port_image) }}" alt="Card image cap">
                                                @error('portfolio_image')
                                                <span class="text-danger">{{$messege}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-9 mt-4">
                                                <input class="form-control" type="file" name="port_image" id="image">
                                            </div>
                                        </div>
                                        <input type="submit" value="Update Portfolio Data" class="btn btn-outline-info waves-effect waves-light">
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