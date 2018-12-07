@extends('account.homepage')

@section('content')



<h2 class="box-title " >Role</h2>



{{--  create  --}}


  <!-- general form elements disabled -->
  
  <div style="display: none" class="box box-warning add_product">
    <div class="box-header with-border">
      <h3 class="box-title">Add New Role </h3>
      @permission('role-read')
      <div class="text-right">
         <h3 class="box-title "> Show Roles 	<button type="button"  id='showProduct' class='btn btn-link btn-sm '>
                            <i id='' class=' fa fa-plus'></i>
          </button>
           </h3>
          </div>
          @endpermission
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form method="post" action="{{route('Role.store')}}" role="form">
          {{ csrf_field() }}
        <!-- text input -->
        <div class="form-group"> 
          <label>Role Name</label>
          <input name="Role_Name"  type="text" class="form-control" placeholder="Enter ...">
        </div>

        <!-- text input -->
        <div class="form-group">
          <label>Role display Name</label>
          <input name="Role_DisplayName"  type="text" class="form-control" placeholder="Enter ...">
        </div>
       
  
        <!-- textarea -->
        <div class="form-group">
          <label>Role Descraption</label>
          <textarea name="Role_Descraption" class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>


        <!-- text input -->
        <div class="">
          <label>Role Permissions</label> <br> <br>
          @foreach ( $Permissions as  $Permission)
          <div class="col-md-3">

        
          <input class="minimal " value="{{$Permission->id}}"  name="Role_Permissionsme[]"  type="checkbox"  > <label>{{$Permission->name}}</label>  <br>
          </div>
              
          @endforeach
          
        </div>
        
  
  
        <div class="box-footer">
          {{--  <button type="submit" class="btn btn-default">Cancel</button>  --}}
          <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
    
      </form>
    </div>
    <!-- /.box-body -->
    <div class="callout callout-warning text-center">
        <h4>if you want to access Admin url 
          you should checked permission 
          <br><b>Access_admin_panel</b>!</h4>

        
      </div>
  </div>
  <!-- /.box -->
  


{{--  table show Roles :) :)  --}}

  <div class="box tbshow">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
      @permission('role-create')
          <div class="text-right">

         
          <h3 class="box-title "> Add new Role 	<button type="button"  id='AddProduct' class='btn btn-link btn-sm '>
					                	<i id='' class=' fa fa-plus'></i>
          </button>
           </h3>
          </div>
          @endpermission
     
           </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
              <th>name</th>
              <th>display name</th>
              <th>Discraption</th>
              <th>Actions</th>
              
        </tr>
        </thead>
        <tbody>
            @foreach ($Roles as $Role )
               <tr>

                  <td>{{$Role->id}}</td>
                  <td>{{$Role->name}}</td>
                  <td>{{$Role->display_name}}</td>
                  <td>{{$Role->description}}</td>
                  <td>
                    <div class="row">
                        @permission('role-edit')
                      <div class="col-md-3">
                          <a href="{{route('Role.edit',$Role->id)}}" class='btn btn-info btn-sm'><i class='fa fa-edit'></i></a>  
                      </div>
                      @endpermission
                      @permission('role-delete')
                      <div class="col-md-3">
                          <form action="{{route('Role.destroy',$Role->id)}}" method="post">
                              {{ csrf_field() }}
                              {{method_field('DELETE')}}
      
                              <button type="submit" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                          </form>
                        
                        </div>
                        @endpermission
                    </div>
                   
                   </td>


                </tr>

                @endforeach 
         
       
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>display name</th>
            <th>Discraption</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->













@stop