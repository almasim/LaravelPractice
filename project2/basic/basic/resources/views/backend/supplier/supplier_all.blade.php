@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('supplier.add')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle" style="float:right;">Add Supplier</a> <br>
                        <h4 class="card-title">All Suppliers</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Supplier Name</th>
                                <th>Mobile Number</th>
                                <th>Address</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php($i=1)
                            @foreach ($suppliers as $key => $item) 
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->mobile_number}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <a href="{{ route('supplier.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                        <a href="{{ route('supplier.delete',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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