@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('stock.report.pdf')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-print" target="_blank" style="float:right;">Print Report</a> <br>
                        <h4 class="card-title">Customer Wise Report</h4>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <strong>Customer Wise Credit Report</strong>
                                <input type="radio" name="customer_wise" value="credit_wise" class="search_value">&nbsp; &nbsp;


                                <strong>Customer Wise Paid Report</strong>
                                <input type="radio" name="customer_wise" value="paid_wise" class="search_value">
                            </div>
                            
                        </div> <!--end row-->

                        {{-- Customer Credit --}}
                        <div class="show_credit" style="display:none">
                            <form method="GET" id="myForm"  action="{{route('credit.wise.pdf')}}">
                                <div class="row">
                                    <div class="col-sm-8 form-group" >
                                        <label for="">Customer Name</label>
                                        <select name="customer_id" id="customer_id" class="form-select select2" aria-label="Default select example" target='_blank'>
                                            <option value="">Select Customer</option>
                                            @foreach ($costumers as $key=>$item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-4" style="padding-top:27px;">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Costumer Credit End --}}


                        {{-- Costumer Paid  --}}
                        <div class="show_paid" style="display:none">
                            <form method="GET" id="myForm"  action="{{route('paid.wise.pdf')}}">
                                <div class="row">
                                    <div class="col-sm-8 form-group" >
                                        <label for="">Customer Name</label>
                                        <select name="customer_id" id="customer_id" class="form-select select2" aria-label="Default select example" target='_blank'>
                                            <option value="">Select Customer</option>
                                            @foreach ($costumers as $key=>$item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-4" style="padding-top:27px;">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Costumer Paid End --}}



                    </div>
                </div>
            </div> <!-- end col -->
        </div> 
    </div>
</div>

<script type="text/javascript">

    $(document).on('change','.search_value',function(){
        var search_value = $(this).val();
        if(search_value=='paid_wise'){
            $('.show_paid').show();
            $('.show_credit').hide();
        } else {
            $('.show_paid').hide();
            $('.show_credit').show();
        }
        
    })

</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                supplier_id: {
                    required : true,
                }, 
                category_id: {
                    required : true,
                }, 
                product_id: {
                    required : true,
                }, 

                
            },
            messages :{
                name: {
                    supplier_id : 'Please Select Supplier',
                },
                name: {
                    category_id : 'Please Select Supplier',
                },
                name: {
                    product_id : 'Please Select Supplier',
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
    $(function(){
        $(document).on('change','#category_id',function(){
            var category_id=$(this).val();
            $.ajax({
                url:"{{ route('get-product') }}",
                type:"GET",
                data:{category_id:category_id},
                success:function(data){
                    var html='<option value="">Select Product</option>';
                    $.each(data,function(key,v){
                        html+='<option value="'+v.id+'">'+v.name+'</option>'
                    });
                    $('#product_id').html(html);
                }
            });
        });
    });
 </script>

@endsection