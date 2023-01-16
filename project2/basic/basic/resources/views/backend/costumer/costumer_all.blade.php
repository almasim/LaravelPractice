@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('costumer.add')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle" style="float:right;">Add Customer</a> <br>
                        <h4 class="card-title">All Customers</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Custumer Name</th>
                                <th>Custumer Image</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php($i=1)
                            @foreach ($costumer as $key => $item) 
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{asset($item->costumer_image)}}" style="width: 60px;height:50px;" alt=""></td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>
                                        <a href="{{ route('costumer.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                        <a href="{{ route('costumer.delete',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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