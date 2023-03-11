@extends('account.homepage') @section('content')

<!-- form Update user  -->
<div  class=" register-box">
  <div class="register-logo">
  
     
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"> </p>
   


    <form action="{{url('/Admin/userUpdate')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="user_id" value="{{$user->id}}">
      <div class="form-group has-feedback">
        <input value="{{$user->name}}" name="user_name" type="text" class="form-control" placeholder="أسم المستخدم">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input value="{{$user->email}}" name="user_email" type="email" class="form-control" placeholder="البريد الألكتروني">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input value="{{$user->password}}" name="user_password" type="password" class="form-control" placeholder="الباسورد">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
      <input  type="text" class="form-control" value="{{$user->address}}" name="address" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
     

      <img height="50px;" width="50px" class="img-responsive" src="{{asset('/Upload/'.$user->url.'')}}" alt="">

      <div class="form-group has-feedback">
        <label>صورة الشخصية</label>
        <div class="input-group">
          <input name="user_url" id="Product_url" type="file" class="form-control">
        </div>
      </div>

      <div class="row">


        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">حفظ</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



  </div>
  <!-- /.form-box -->
</div>

























@stop