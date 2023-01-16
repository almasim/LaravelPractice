@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('invoice.add')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle" style="float:right;"> Add Invoice</a> <br>
                        <h4 class="card-title">All Ivoice</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Costumer Name</th>
                                <th>Invoice Number</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($allData as $key => $item) 
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{$item['payment']['costumer']['name']}}</td>
                                    <td>#{{$item->invoice_number}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                    <td>{{$item->desc}}</td>
                                    <td>${{$item['payment']['total_amount']}}</td>
                                    <td>
                                        @if($item->status == '0')
                                        <span class="btn btn-warning">Pending</span>
                                        @elseif($item->status=='1')
                                        <span class="btn btn-success">Approved</span>
                                        @endif
                                    </td>
                                    <td>                                        
                                        @if($item->status =='0')
                                        <a href="{{ route('invoice.approve',$item->id) }}"  class="btn btn-dark sm" title="Approve Data"><i class="fas fa-check-circle"></i></a>
                                        <a href="{{ route('invoice.delete',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>

                                        @endif
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