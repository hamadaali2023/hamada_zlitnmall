@extends('account.homepage') @section('content') {{-- show the users in DB --}}

<!-- form add new user  -->
<div style="display: none" class=" add_product register-box">
  <div class="register-logo">
    
      
  </div>


  <div class="register-box-body">
    <p class="login-box-msg">أضافة مستخدم جديد </p>
    <div class="text-right">
      <h6 class="box-title "> عرض المستخدمين
        <button type="button" id='showProduct' class='btn btn-link btn-sm '>
          <i id='' class=' fa fa-plus'></i>
        </button>
      </h6>
    </div>


    <form action="{{url('/Admin/userstore')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input name="user_name" type="text" class="form-control" placeholder="الأسم المستخدم" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="user_email" type="email" class="form-control" placeholder="الأيميل" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="user_password" type="password" class="form-control" placeholder="الباسورد" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="العنوان" name="address" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <label>صوره شخصية</label>
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



<!-- /.show all user from  DB -->

<div class="box tbshow">
  <div class="box-header">
    <h3 class="box-title">عرض جميع المستخدمين</h3>
    @permission('أنشاء-مستخدم')
    <div class="text-right">
      <h3 class="box-title "> أضافة مستخدم جديد
        <button type="button" id='AddProduct' class='btn btn-link btn-sm '>
          <i id='' class=' fa fa-plus'></i>
        </button>
      </h3>
    </div>
  </div>
  @endpermission
  <!-- /.box-header -->
  <div style="overflow-x:auto">
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>التسلسل</th>
          <th>صورة المستخدم</th>
          <th>الاسم</th>
          <th>البريد الالكتروني</th>
          <th>الصلاحية</th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        @foreach ($users as $i=>$user )

        <form method="POST" action="{{url('/add-role')}}">
          {{csrf_field()}}
          <input type="hidden" name="email" value=" {{ $user->email }}">
          <tr>
            <td>{{$i+1}}</td>
            <td>
              <img height="50px;" width="50px" class="img-responsive" src="{{asset('Upload/'.$user->url.'')}}" alt="">
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
              @foreach ($user->roles as $role )
              <div class="col-md-6">{{$role->name}} </div>
              @endforeach
            </td>
        </form>
        <td class='actions ' data-th=''>
          @permission('تعديل-مستخدم')
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal-{{$user->id}}">
            <i class='fa fa-edit'></i> صلاحية
          </button>
          @endpermission @permission('تعديل-مستخدم')
          <a href='{{url('/Admin/UpdateUser/'.$user->id.'')}}' class='btn btn-info btn-sm'>
            <i class='fa fa-edit'></i>
          </a>
          @endpermission @permission('حذف-مستخدم')
          <a href='{{url('/Admin/DeleteUser/'.$user->id.'')}}' class='btn btn-danger btn-sm'>
            <i class="fa fa-trash"></i>
          </a>
          @endpermission
        </td>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$user->name}} تعديل الصلاحية</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="Role_form-{{$user->id}}" action="{{url('/Admin/userUpdateRole/'.$user->id.'')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group ">

                    <label>Multiple</label>
                    <select name="role[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Role" style="width: 100%;">
                      <option value="0">select</option>
                      @foreach ($Roles as $Role)
                      <option value="{{$Role->id}}">{{$Role->name}}</option>

                      @endforeach

                    </select>
                  </div>


                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button onclick="$('#Role_form-{{$user->id}}' ).submit()" type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        </tr>

        @endforeach

      </tbody>
      
    </table>
  </div>
</div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@stop