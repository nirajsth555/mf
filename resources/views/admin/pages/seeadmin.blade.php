@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	        List  Project
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>See Project</a></li>
	    </ol>
	</section>
@stop

@section('seeadmin')
@if(Session::has('success_message'))
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
  
  <div class="alert-success alert-dismissible alertDismissible">{{ Session::get('success_message') }}</div>



@endif

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
      <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
    </div> 
    <div class="box-body">
    	<table id="news-table" class="table table-bordered table-striped">
            <thead>
                <tr>

                	<th style="width: 5px">S.N</th>
                  	<th>Full Name</th>
                  	<th>Email</th>
                    <th>Type of Admin</th>
                  	<th>Change Power</th>
                  	<th>Delete Admin</th>
                  	
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr>
                  	<td>{{++$key}}</td>
                  	<td>{{$n->name}}
                  	</td>
                  	<td>{{$n->email}}</td>
                    @if($n->power==1)
                    <td>Super Admin</td>
                    @else
                    <td>Admin</td>
                    @endif


                    @if($n->power==1)
                  	<td><a href="{{url('change-to-admin')}}/{{$n->id}}"> <span class="label label-primary">Change Power to Admin</span></a></td>
                    @else
                    <td><a href="{{url('change-to-super')}}/{{$n->id}}"> <span class="label label-primary">Change Power to Super Admin</span></a></td>
                    @endif

                  	<td><a href="{{url('delete-admin')}}/{{$n->id}}"> <span class="label label-danger">Delete</span></a></td>
                  	
                </tr>
                  	@endforeach
               
            </tbody>
           
  		</table>
    </div> 
  </div>
@stop