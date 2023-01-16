@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        @php
        $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
        @endphp
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Invoice Number #{{$invoice->invoice_number}} - {{date('d m Y',strtotime($invoice->date))}}</h4>
                        <a href="{{route('invoice.pending')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-list" style="float:right;">    Panding Invoice List</a> <br>
                        <h4 class="card-title">Approve Invoice</h4>
                        <table class="table table-dark" width='100%' >
                            <tbody>
                                <tr>
                                    <td><p>Costumer Info</p></td>
                                    <td><p>Name: <strong> {{$payment['costumer']['name']}}</strong></p></td>
                                    <td><p>Mobile: <strong> {{$payment['costumer']['mobile_number']}}</strong></p></td>
                                    <td><p>Email: <strong> {{$payment['costumer']['email']}}</strong></p></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3"><p>Description: <strong> {{$invoice->desc}}</strong></p></td>

                                </tr>
                            </tbody>
                        </table>

                        <form method="POST" action="{{ route('approval.store',$invoice->id) }}" >
                            @csrf
                            
                            <table border="1" class="table table-dark" width='100%' >
                                <thead>
                                    <tr>

                                        <th class="text-center">Serial Number</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center" style="background-color: #8B008B">Current Stock</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total_sum='0'; //declare a variable 
                                    @endphp
                                    @foreach($invoice['invoice_details'] as $key=>$details)
                                    <tr>
                                        <input type="hidden" name="category_id[]" value="{{$details->category_id}}">
                                        <input type="hidden" name="product_id[]" value="{{$details->product_id}}">
                                        <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{$details->selling_qty}}">
                                        
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $details['category']['name'] }}</td>
                                        <td class="text-center">{{ $details['product']['name'] }}</td>
                                        <td class="text-center" style="background-color: #8B008B">{{ $details['product']['quantity'] }}</td>
                                        <td class="text-center">{{ $details->selling_qty }}</td>
                                        <td class="text-center">{{ $details->unit_price }}</td>
                                        <td class="text-center">{{ $details->selling_price }}</td>
                                    </tr>
                                    @php
                                    $total_sum+= $details->selling_price //adding sum 1by 1
                                    @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="6">Sub total</td>
                                        <td >{{$total_sum}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Discount</td>
                                        <td >{{$payment->discount_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Paid Amount</td>
                                        <td >{{$payment->paid_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Due Amount</td>
                                        <td >{{$payment->due_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Grand Total</td>
                                        <td >{{$payment->total_amount}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-info">Invoice Approve </button>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> 
    </div>
</div>


@endsection