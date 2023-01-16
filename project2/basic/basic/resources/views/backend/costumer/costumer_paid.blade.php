@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('paid.customer.print.pdf') }}" class="btn btn-dark btn-rounded waves-effect waves-light" target="_black" style="float:right;"><i class="fa fa-print"> Print Paid Customer </i></a> <br>
                        <h4 class="card-title">Paid Customers</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Customer Name</th>
                                <th>Invoice Number</th>
                                <th>Date</th>
                                <th>Due Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($allData as $key => $item) 
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{$item['costumer']['name']}}</td>
                                    <td>{{$item['invoice']['invoice_number']}}</td>
                                    <td>{{date('Y. m. d.',strtotime($item['invoice']['date']))}}</td>
                                    <td>${{$item->due_amount}}</td>
                                    <td>
                                        <a href="{{ route('costumer.invoice.details.pdf',$item->invoice_id) }}" class="btn btn-info sm" target="_blank" title="View Data"><i class="fas fa-eye"></i></a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> 
    </div>
</div>


@endsection