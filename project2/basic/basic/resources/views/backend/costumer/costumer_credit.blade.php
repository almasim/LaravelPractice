@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('costumer.credit.print')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-print" style="float:right;">  Print Credit Customer</a> <br>
                        <h4 class="card-title">Credit Customers</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Custumer Name</th>
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
                                    <td>{{date('d m Y',strtotime($item['invoice']['date']))}}</td>
                                    <td>{{$item->due_amount}}</td>
                                    <td>
                                        <a href="{{ route('costumer.edit.invoice',$item->invoice_id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                        <a href="{{ route('costumer.invoice.details.pdf',$item->invoice_id) }}"  class="btn btn-danger sm" title="Costumer Invoice Details"><i class="fas fa-eye"></i></a>
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