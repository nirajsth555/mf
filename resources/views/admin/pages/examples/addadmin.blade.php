@extends('admin.layout')
@section('dashboard')
<section class="content-header">
      <h1>
        Add Admin
        
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Add Admin</li>
        
      </ol>
    </section>
@stop

@section('addadmin')	
@if(Session::has('success_message'))
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
  
  <div class="alert-success alert-dismissible alertDismissible">{{ Session::get('success_message') }}</div>



@endif
<div class="register-box-body">
   

    <form action="{{url('admin-added')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="fullname" placeholder="Full name" value="{{Request::old('fullname')}}">{{$errors->first('fullname')}} 
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{Request::old('email')}}">{{$errors->first('email')}} 
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"  name="password" placeholder="Password" >{{$errors->first('password')}} 
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="confirmpassword" placeholder="Retype password" value="">{{$errors->first('confirmpassword')}} 
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" name="type_admin"  class="option"> 
        <option value="" disabled selected>Select Type of admin</option>
        <option value="1">Super Admin</option>
        <option value="0">Admin</option>
        </select>{{$errors->first('type_admin')}}
      </div>
      
        
        <!-- /.col -->
        <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>
        
        <!-- /.col -->
      
    </form>
    </div>


@stop