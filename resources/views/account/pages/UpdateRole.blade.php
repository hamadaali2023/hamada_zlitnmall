@extends('account.homepage')

@section('content')





<div class="row">
        <!-- general form elements disabled -->
        <div class="col-xs-12 ">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Add New Role </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form method="post" action="{{route('Role.update',$Role->id)}}" role="form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
              <!-- text input -->
              <div class="form-group"> 
                <label>Role Name</label>
                <input value="{{$Role->name}}" name="Role_Name"  type="text" class="form-control" placeholder="Enter ...">
              </div>
      
              <!-- text input -->
              <div class="form-group">
                <label>Role display Name</label>
                <input value="{{$Role->display_name}}" name="Role_DisplayName"  type="text" class="form-control" placeholder="Enter ...">
              </div>
             
        
              <!-- textarea -->
              <div class="form-group">
                <label>Role Descraption</label>
                <input type="text" value="{{$Role->description}}" name="Role_Descraption" class="form-control"  placeholder="Enter ..."></input>
              </div>
      
      
              <!-- text input -->
              <div class="">
                <label>Role Permissions</label> <br> <br>
                @foreach ( $Permissions as  $Permission)
                <div class="col-md-3">
      
              
                <input   {{in_array($Permission->id,$Role_Permissions)?"checked":""}}    class="minimal " value="{{$Permission->id}}"  name="Role_Permissionsme[]"  type="checkbox"  > <label>{{$Permission->name}}</label>  <br>
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
        </div>
        </div>
        <div class="callout callout-warning text-center">
            <h4>if you want to access Admin url 
              you should checked permission 
              <br><b>Access_admin_panel</b>!</h4>
    
            
          </div>
      
      </div>



      @stop