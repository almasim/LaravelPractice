@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add  Purchase</h4><br><br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Date</label>
                                <input name="date" class="form-control" type="date"  id="date">
                        </div>
                    </div> 
                    
                    <div class="col-md-4">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Purchase Number</label>
                                <input name="purchase_number" class="form-control" type="text"  id="purchase_number">
                        </div>
                    </div> 

                    <div class="col-md-4">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Supplier Name</label>
                            <select id="supplier_id" name="supplier_id" class="form-select select2" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach ($supplier as $key=>$item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div> 

                    <div class="col-md-4">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Category Name</label>
                            <select id="category_id" name="category_id" class="form-select select2" aria-label="Default select example">
                                <option selected="">Select Supplier First</option>
                                </select>
                        </div>
                    </div> 

                    <div class="col-md-4">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Product Name</label>
                            <select id="product_id" name="product_id" class="form-select select2" aria-label="Default select example">
                                <option selected="">Select Category First</option>
                                </select>
                        </div>
                    </div> 

                    <div class="col-md-4">
                        <div class="md-3">
                            <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore" style="margin-top: 30px" > Add More</i>
                        </div>
                    </div> 

                </div>{{--  Endrow --}}

          
           
           
            </div> {{--  EndCardboard --}}
            <div class="card-body">
                <form method="post" action="{{route('purchase.store')}}">
                    @csrf
                    <table class="table-sm table-bordered" width="100%" style="border-color:#ddd;">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>PSC/KG</th>
                            <th>Unit Price</th>
                            <th>Desc</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody id="addRow" class="addRow">

                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="5"></td>
                            <td>
                                <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;">
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                    </table>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info" id="storeButon">Purchase Store</button>
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

<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date[]" value="@{{date}}">
            <input type="hidden" name="purchase_number[]" value="@{{purchase_number}}">
            <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
    
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{ category_name }}
        </td>
    
         <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{ product_name }}
        </td>
    
         <td>
            <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value=""> 
        </td>
    
        <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]" value=""> 
        </td>
    
     <td>
            <input type="text" class="form-control" name="desc[]"> 
        </td>
    
         <td>
            <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly> 
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
            var purchase_number = $('#purchase_number').val();
            var supplier_id = $('#supplier_id').val();
            var category_id  = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();


            if(date == ''){
                $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(purchase_number == ''){
                $.notify("Purchase No is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(supplier_id == ''){
                $.notify("Supplier is Required" ,  {globalPosition: 'top right', className:'error' });
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
                    purchase_number:purchase_number,
                    supplier_id:supplier_id,
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
        $(document).on('keyup click','.unit_price,.bugying_qty',function(){
            var unit_price=$(this).closest("tr").find("input.unit_price").val(); //closest tr area's input unit price value
            var qty=$(this).closest("tr").find("input.buying_qty").val(); //closest tr area's input buying qty value
            var total=unit_price*qty;  //actual calculation
            $(this).closest("tr").find("input.buying_price").val(total); //displaying it in the buying price class
            totalAmountPrice();
        });

        //calculate som of amount in invoice
       function totalAmountPrice(){
            var sum = 0;
            $(".buying_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            });
            $('#estimated_amount').val(sum);
        }  

    })

</script>

@endsection 
