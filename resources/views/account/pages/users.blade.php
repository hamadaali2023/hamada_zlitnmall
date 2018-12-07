@extends('account.homepage') @section('content') {{-- show the users in DB --}}

<!-- form add new user  -->
<div style="display: none" class=" add_product register-box">
  <div class="register-logo">
    <a href="../../index2.html">
      <b>Admin</b>LTE</a>
  </div>
 

  <div class="register-box-body">
    <p class="login-box-msg">Add new User </p>
    <div class="text-right">
      <h6 class="box-title "> Show users
        <button type="button" id='showProduct' class='btn btn-link btn-sm '>
          <i id='' class=' fa fa-plus'></i>
        </button>
      </h6>
    </div>


    <form action="/Admin/userstore" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input name="user_name" type="text" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="user_email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="user_password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <label>Profile Image</label>
        <div class="input-group">
          <input name="user_url" id="Product_url" type="file" class="form-control">
        </div>
      </div>

      <div class="row">


        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Add</button>
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
    <h3 class="box-title">Data Table With Full Features</h3>
    @permission('user-create')
    <div class="text-right">
      <h3 class="box-title "> Add new User
        <button type="button" id='AddProduct' class='btn btn-link btn-sm '>
          <i id='' class=' fa fa-plus'></i>
        </button>
      </h3>
    </div>
   </div>
   @endpermission
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Phote</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>   
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user )

        <form method="POST" action="/add-role">
          {{csrf_field()}}
          <input type="hidden" name="email" value=" {{ $user->email }}">
          <tr>
            <td>{{$user->id}}</td>
            <td>
              <img height="50px;" width="50px" class="img-responsive" src="../../Upload/{{$user->url}}" alt="">
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
            @foreach ($user->roles as $role )
              <div class="col-md-6">{{$role->name}}  </div>
            @endforeach
          </td>
          </form>
            <td class='actions ' data-th=''>
                @permission('role-edit')
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal-{{$user->id}}">
                    <i class='fa fa-edit'></i> Role
                </button>
                @endpermission
                @permission('user-edit')
              <a href='/Admin/UpdateUser/{{$user->id}}' class='btn btn-info btn-sm'><i class='fa fa-edit'></i></a>
              @endpermission
              @permission('user-delete')
              <a  href='/Admin/DeleteUser/{{$user->id}}' class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
              @endpermission
            </td>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$user->name}} Role Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
               <form id="Role_form-{{$user->id}}" action="/Admin/userUpdateRole/{{$user->id}}" method="post" enctype="multipart/form-data">
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
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Phote</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@stop