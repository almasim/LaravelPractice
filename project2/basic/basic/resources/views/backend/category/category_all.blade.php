@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('category.add')}}" class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle" style="float:right;">Add Category</a> <br>
                        <h4 class="card-title">All Categorys</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th width="20%">Serial Number</th>
                                <th>Category Name</th>
                                <th width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categorys as $key => $item) 
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                        <a href="{{ route('category.delete',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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