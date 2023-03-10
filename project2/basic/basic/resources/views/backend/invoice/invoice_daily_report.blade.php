@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daily Invoice Report</h4><br><br>
            <form id="myForm" method="GET" target="_blank" action="{{route('invoice.daily.pdf')}}">
            <div class="row">

                    <div class="col-md-4">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">Start-Date</label>
                                <input name="start_date" class="form-control"  type="date"  id="start_date" placeholder="YY-MM-DD">
                        </div>
                    </div> 

                    <div class="col-md-4">
                        <div class="md-3">
                            <label for="example-text-input" class="form-label">End-Date</label>
                                <input name="end_date" class="form-control"  type="date"  id="end_date" placeholder="YY-MM-DD">
                        </div>
                    </div> 

                    <div class="col-md-4">
                        <div class="md-3">
                            <label for="a" class="form-label" style="margin-top: 43px;"></label>
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </div> 
                
    </div>{{--  Endrow --}}
</form>
</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                start_date: {
                    required : true,
                }, 
                 end_date: {
                    required : true,
                },
            },
            messages :{
                start_date: {
                    required : 'Please Select a starting date',
                },
                end_date: {
                    required : 'Please Select an ending date',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
 
@endsection 
