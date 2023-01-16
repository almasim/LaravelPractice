@extends('admin.admin_master')
@section('admin')
 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Blog</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Serial Number</th>
                                <th>Blog Category</th>
                                <th>Blog Title</th>
                                <th>Blog Img</th>
                                <th>Blog tags</th>
                                <th>Blog desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        
                        <tbody>
                            @php($i=1)
                            @foreach ($blog as $item) 
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item['category']['blog_category']}}</td>
                                <td>{{$item->blog_title}}</td>
                                <td><img src="{{asset($item->blog_image)}}" style="width:60px; height:60px;"alt=""></td>
                                <td>{{$item->blog_tags}}</td>
                                <td>{!!$item->blog_desc!!}</td>
                                <td>
                                    <a href="{{ route('edit.blog',$item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('delete.blog',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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