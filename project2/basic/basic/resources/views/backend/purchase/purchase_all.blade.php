@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('purchase.add')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle" style="float:right;"> Add Purchase</a> <br>
                        <h4 class="card-title">All Purcheses</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Purchase Number</th>
                                <th>Date</th>
                                <th>Supplier</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php($i=1)
                            @foreach ($allData as $key => $item) 
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{$item->purchase_number}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                    <td>{{$item['supplier']['name']}}</td>
                                    <td>{{$item['category']['name']}}</td>
                                    <td>{{$item->buying_qty}}</td>
                                    <td>{{$item['product']['name']}}</td>
                                    <td>
                                        @if($item->status == '0')
                                        <span class="btn btn-warning">Pending</span>
                                        @elseif($item->status=='1')
                                        <span class="btn btn-success">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status =='0')
                                        <a href="{{ route('purchase.delete',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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