@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Supplier </h4><br><br>

            <form id="myForm" method="post" action="{{ route('product.store') }}" >
                @csrf

    
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="form-group col-sm-10">
                        <input name="name" class="form-control" type="text"   id="name">
                    </div>
                </div>
                <!-- end row -->
                

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name</label>
                    <div class="form-group col-sm-10">
                        <select name="supplier_id" class="form-select" aria-label="Default select example">
                            @foreach ($supplier as $key=>$item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                    </div>
                </div>
                <!-- end row -->


                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Unit Name</label>
                    <div class="form-group col-sm-10">
                        <select name="unit_id" class="form-select" aria-label="Default select example">
                            @foreach ($unit as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->

            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                <div class="form-group col-sm-10">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                </div>
            </div>
            <!-- end row -->
        
<input type="submit" class="btn btn-info waves-effect waves-light" value="Add Product">
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
                category_id: {
                    required : true,
                },
                unit_id: {
                    required : true,
                },
                supplier_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                category_id: {
                    required : 'Please Select Category',
                },
                unit_id: {
                    required : 'Please Select Unit',
                },
                supplier_id: {
                    required : 'Please Select Supplier',
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
 
@endsection 
