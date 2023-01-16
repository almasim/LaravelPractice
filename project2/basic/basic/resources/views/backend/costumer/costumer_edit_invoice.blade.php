@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Costumer Invoice (Invoice No: #{{$payment['invoice']['invoice_number']}})</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                            <li class="breadcrumb-item active">Costumer Invoice</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                    <a href="{{route('costumer.credit')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-list" style="float:right;">  Back</a> <br>

    <div class="row">
        <div class="col-12">
            <div>
                <div class="p-2">
                    <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
                </div>
                <div class="">
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td><strong>Customer Name </strong></td>
            <td class="text-center"><strong>Customer Mobile</strong></td>
            <td class="text-center"><strong>Address</strong></td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> {{ $payment['costumer']['name'] }}</td>
            <td class="text-center">{{ $payment['costumer']['mobile_number']  }}</td>
            <td class="text-center">{{ $payment['costumer']['email']  }}</td>
        </tr>


        </tbody>
    </table>
                    </div>


                </div>
            </div>

        </div>
    </div> <!-- end row -->
   <div class="row">
        <div class="col-12">
            <div>
                <div class="p-2">

                </div>
                <div class="">
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td><strong>Sl </strong></td>
            <td class="text-center"><strong>Category</strong></td>
            <td class="text-center"><strong>Product Name</strong>
            </td>
            <td class="text-center"><strong>Current Stock</strong>
            </td>
            <td class="text-center"><strong>Quantity</strong>
            </td>
            <td class="text-center"><strong>Unit Price </strong>
            </td>
            <td class="text-center"><strong>Total Price</strong>
            </td>

        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->

      @php
      $total_sum=0;
$invoice_details=App\Models\InvoiceDetails::where('invoice_id',$payment->invoice_id)->get()
        @endphp
        @foreach($invoice_details as $key => $details)
        <tr>
           <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center">{{ $details['product']['quantity'] }}</td>
            <td class="text-center">{{ $details->selling_qty }}</td>
            <td class="text-center">{{ $details->unit_price }}</td>
            <td class="text-center">{{ $details->selling_price }}</td>

        </tr>
         @php
        $total_sum += $details->selling_price;
        @endphp
        @endforeach
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center">
                                    <strong>Subtotal</strong></td>
                                <td class="thick-line text-end">${{$total_sum}}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                 <td class="no-line"></td>
                                  <td class="no-line"></td>
                                   <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center">
                                    <strong>Paid Amount</strong></td>
                                <td class="no-line text-end">${{$payment->paid_amount}}</td>
                            </tr>
                            <tr>
                                <tr>
                                    <td class="no-line"></td>
                                     <td class="no-line"></td>
                                      <td class="no-line"></td>
                                       <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center">
                                        <strong>Due Amount</strong></td>
                                        <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                                        @if ($payment->paid_status=='full_paid')
                                        <td class="no-line text-end">Fully Paid</td>
                                        @else
                                        <td class="no-line text-end">{{$payment->due_amount}}</td> 
                                        @endif

                                </tr>
                                <tr>
                            <tr>
                                <td class="no-line"></td>
                                 <td class="no-line"></td>
                                  <td class="no-line"></td>
                                   <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center">
                                    <strong>Discount Amount</strong></td>
                                @if($payment->discount_amount!=null)
                                <td class="no-line text-end">{{$payment->discount_amount}}%</td>           
                                @else
                                <td class="no-line text-end">No discount</td>
                                @endif 
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                 <td class="no-line"></td>
                                  <td class="no-line"></td>
                                   <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center">
                                    <strong>Grand Amount</strong></td>
                                <td class="no-line text-end"><h4 class="m-0">${{$payment->total_amount}}</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div> <!-- end row -->

    {{-- start row --}}
        <div class="row">

<form method="post" action="{{ route('costumer.update.invoice',$payment->invoice_id)}}">
    @csrf
            {{-- Paid Status --}}
            <div class="form-group col-md-3">
                <label >Paid Status</label>
                <select class="form-select" name="paid_status" id="paid_status">
                    <option value="">Select Status</option>
                    <option value="full_paid">Full Paid</option>
                    <option value="partial_paid">Partially Paid</option>
                </select>
                <br>
                <input type="text"style="display: none;" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount">
            </div>
            {{-- Paid Status End --}}


            {{-- Date --}}
            <div class="form-group col-md-3">
                <label for="example-text-input" class="form-label">Date</label>
                <input name="date" class="form-control" placeholder="YYYY-MM-DD" type="date"  id="date">
            </div>
            {{-- Date End --}}

  

            {{-- Button --}}
            <div class="form-group col-md-3" >
                  
                <div class="md3">
                    <button type="submit" style="margin-top: 30px" class="btn btn-info">Invoice Update</button>
                </div>
            </div>
            {{-- Button End --}}
            </form>
        </div>
    {{-- end row --}}
</div>
</div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
            
<script type="text/javascript">
$(document).on('change','#paid_status',function(){
    var paid_status = $(this).val();
    if(paid_status=='partial_paid'){
        $('.paid_amount').show();
    } else {
        $('.paid_amount').hide();
    }
    
})
</script>
@endsection