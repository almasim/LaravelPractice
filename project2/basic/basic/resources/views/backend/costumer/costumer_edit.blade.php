@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Customer </h4><br><br>

            <form id="myForm" method="post" action="{{ route('costumer.update') }}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="id" value="{{$costumer->id}}">
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{$costumer->name}}"   id="name">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="form-group col-sm-10">
                    <input name="mobile_number" class="form-control" type="text" value="{{$costumer->mobile_number}}"    id="mobile_number">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" type="email"  value="{{$costumer->email}}"   id="email">
                </div>
            </div>
            <!-- end row -->

            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" type="text" value="{{$costumer->address}}"  id="address">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image </label>
                <div class="col-sm-10">
                        <input name="costumer_image" class="form-control" type="file"  id="image">
                </div>
            </div>
              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
                    <img id="showImage" class="rounded avatar-lg" src="{{ url($costumer->costumer_image) }}" alt="Card image cap">
                </div>
            </div>
            <!-- end row -->
        
<input type="submit" class="btn btn-info waves-effect waves-light" value="Update Customer">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 email: {
                    required : true,
                },
                 address: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                address: {
                    required : 'Please Enter Your Address',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
 
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
@endsection 
