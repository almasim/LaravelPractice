@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Portfolio All</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Portfolio Name</th>
                                <th>Portfolio Title</th>
                                <th>Portfolio Img</th>
                                <th>Portfolio Desc</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @php($i=1)
                                @foreach ($port as $item) 
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->port_name}}</td>
                                <td>{{$item->port_title}}</td>
                                <td><img src="{{asset($item->port_image)}}" style="width:60px; height:60px;"alt=""></td>
                                <td>{!!$item->port_desc!!}</td>
                                <td>
                                    <a href="{{ route('edit.port',$item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('delete.port',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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