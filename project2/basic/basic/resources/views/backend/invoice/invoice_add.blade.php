@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <div class="row">
            <h4 class="card-title">Add  Invoice</h4><br><br>
            <div class="col-md-1">
                <div class="md-3">
                    <label for="example-text-input" class="form-label">Invoice Number</label>
                        <input name="invoice_number" class="form-control" type="text"  value="{{$invoice_number}}" readonly stlye="background-color:#ddd;" id="invoice_number">
                </div>
            </div> 

                    <div class="col-md-2">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Date</label>
                                <input name="date" class="form-control" value="{{$date}}" type="date"  id="date">
                        </div>
                    </div> 
                    

                    <div class="col-md-3">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Category Name</label>
                            <select id="category_id" name="category_id" class="form-select select2" aria-label="Default select example">
                                <option selected="">Select Category First</option>
                                @foreach ($category as $key=>$item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div> 

                    <div class="col-md-3">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Product Name</label>
                            <select id="product_id" name="product_id" class="form-select select2" aria-label="Default select example">
                                <option selected="">Select Category First</option>
                                </select>
                        </div>
                    </div> 

                    <div class="col-md-1">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Stock (Pc/kg)</label>
                            <input name="current_stock_qty" class="form-control" type="text"  readonly stlye="background-color:#ddd;" id="current_stock_qty">
                                </select>
                        </div>
                    </div> 

                    <div class="col-md-2">
                        <div class="md-3">
                            <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore" style="margin-top: 30px" > Add More</i>
                        </div>
                    </div> 

                </div>{{--  Endrow --}}

          
           
           
            </div> {{--  EndCardboard --}}
            <div class="card-body">
                <form method="post" action="{{route('invoice.store')}}">
                    @csrf
                    <table class="table-sm table-bordered" width="100%" style="border-color:#ddd;">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th width="15%">PSC/KG</th>
                            <th width="10%">Unit Price</th>
                            <th width="7%">Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody id="addRow" class="addRow">

                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="4">Discount</td>
                            <td>
                                <input type="text" pattern="\d*" maxlength="3" name="discount_amount" id="discount_amount" class="form-control " placeholder="Discount Amount" style="background-color: #ddd;">
                            </td>                        
                        </tr>
                        <tr>
                            <td colspan="4">Grand Total</td>
                            <td>
                                <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;">
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                    </table>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea name="desc" id="desc" class="form-control" placeholder="Write Description Here"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label >Paid Status</label>
                            <select class="form-select" name="paid_status" id="paid_status">
                                <option value="">Select Status</option>
                                <option value="full_paid">Full Paid</option>
                                <option value="full_due">Full due</option>
                                <option value="partial_paid">Partially Paid</option>
                            </select>
                            <br>
                            <input type="text"style="display: none;" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount"> 
                        </div>

                        <div class="form-group col-md-9">
                            <label >Costumer Name</label>
                            <select class="form-select" name="costumer_id" id="costumer_id">
                                <option value="">Select Costumer</option>
                                @foreach($costumer as $item)
                                <option value="{{$item->id}}">{{$item->id}}-{{$item->name}} - {{$item->mobile_number}}</option>
                                @endforeach
                                <option value="0">Create Customer</option>
                            </select>
                        </div>
                    </div>{{--  //end row --}}
                    <br>
                    {{-- Hide ADD Costumer form --}}
                    <div class="row new_costumer" style="display:none;">
                        <div class="form-group col-md-4">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Write Costumer Name">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Write Mobile Number">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Write Costumer email">
                        </div>
                    </div>
                    {{-- end costumer form --}}
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info" id="storeButon" >Invoice Store</button>
                    </div>

                </form>

            </div> {{--  EndCardboard --}}
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>

 <script type="text/javascript">
    $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id=$(this).val();
            $.ajax({
                url:"{{ route('get-category') }}",
                type:"GET",
                data:{supplier_id:supplier_id},
                success:function(data){
                    var html='<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html+='<option value="'+v.category_id+'">'+v.category.name+'</option>'
                    });
                    $('#category_id').html(html);
                }
            });
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

<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id=$(this).val();
            $.ajax({
                url:"{{ route('check-product') }}",
                type:"GET",
                data:{product_id:product_id},
                success:function(data){
                    $('#current_stock_qty').val(data);
                }
            });
        });
    });
 </script>

<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date" value="@{{date}}">
            <input type="hidden" name="invoice_number" value="@{{invoice_number}}">
    
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{ category_name }}
        </td>
    
         <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{ product_name }}
        </td>
    
         <td>
            <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" value=""> 
        </td>
    
        <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]" value=""> 
        </td>
    
     <td>
        <input type="number" class="form-control selling_price text-right" name="selling_price[]" value=""> 
        </td>
         <td>
            <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
        </td>
    
        </tr>
    
    </script>

 <script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click",".addeventmore",function(){
            var date = $('#date').val();
            var invoice_number = $('#invoice_number').val();
            var category_id  = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();


            if(date == ''){
                $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(category_id == ''){
                $.notify("Category is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(product_id == ''){
                $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                 var source = $("#document-template").html();
                 var tamplate = Handlebars.compile(source);
                 var data = {
                    date:date,
                    invoice_number:invoice_number,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name
                 };
                 var html = tamplate(data);
                 $("#addRow").append(html); 
        });


        //deleting single item
        $(document).on("click",".removeeventmore",function(e){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });


        //calculation
        $(document).on('keyup click','.unit_price,.selling_qty',function(){
            var unit_price=$(this).closest("tr").find("input.unit_price").val(); //closest tr area's input unit price value
            var qty=$(this).closest("tr").find("input.selling_qty").val(); //closest tr area's input buying qty value
            var total=unit_price*qty;  
            $(this).closest("tr").find("input.selling_price").val(total); //displaying it in the buying price class
            $('#discount_amount').trigger('keyup');
        });
        $(document).on('keyup','#discount_amount',function(){
            totalAmountPrice();
         });

        //calculate som of amount in invoice
       function totalAmountPrice(){
            var sum = 0;
            $(".selling_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            });

            var discount_amount = parseFloat($('#discount_amount').val());
            if(!isNaN(discount_amount) && discount_amount.length != 0){
                   sum=sum-(sum* (parseFloat(discount_amount)*0.01));
                }

            $('#estimated_amount').val(sum);
        }  

    })

</script>

<script type="text/javascript">

    $(document).on('change','#paid_status',function(){
        var paid_status = $(this).val();
        if(paid_status=='partial_paid'){
            $('.paid_amount').show();
        } else {
            $('.paid_amount').hide();
        }
        
    })

    $(document).on('change','#costumer_id',function(){
        var costumer_id = $(this).val();
        if(costumer_id=='0'){
            $('.new_costumer').show();
        } else {
            $('.new_costumer').hide();
        }
        
    })

</script>

@endsection 
