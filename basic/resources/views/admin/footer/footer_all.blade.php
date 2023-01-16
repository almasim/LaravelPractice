@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
        <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Footer Page</h4>
                                        <form method="POST" action="{{ route('footer.update')}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $allfooter->id}}">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="number" value="{{ $allfooter->number }}" id="number">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Desc</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="short_desc" id="short_desc" required rows="5">{{ $allfooter->short_desc }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="address" value="{{ $allfooter->address }}" id="address">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="email" value="{{ $allfooter->email }}" id="email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="facebook" value="{{ $allfooter->facebook }}" id="facebook">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="twitter" value="{{ $allfooter->twitter }}" id="twitter">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="copyright" value="{{ $allfooter->copyright }}" id="copyright">
                                            </div>
                                        </div>
                                        <input type="submit" value="Update Footer" class="btn btn-outline-info waves-effect waves-light">
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