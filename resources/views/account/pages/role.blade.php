@extends('account.homepage')

@section('content')



<h2 class="box-title " >الصالحيات</h2>



{{--  create  --}}


  <!-- general form elements disabled -->
  
  <div style="display: none" class="box box-warning add_product">
    <div class="box-header with-border">
      <h3 class="box-title">أضافة صالحية جديدة </h3>
      @permission('قراءة-الصلحيات')
      <div class="text-right">
         <h3 class="box-title "> عرض الصالحيات 	<button type="button"  id='showProduct' class='btn btn-link btn-sm '>
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
          <label>أسم الصالحية</label>
          <input name="Role_Name"  type="text" class="form-control" placeholder="أدخل ...">
        </div>
        <!-- textarea -->
        <div class="form-group">
          <label>شرح مبسط للصالحية </label>
          <textarea name="Role_Descraption" class="form-control" rows="3" placeholder="أدخل ..."></textarea>
        </div>
        <!-- text input -->
        
        <div class="">
          <label>أذونات الصالحية</label> <br> <br>
          @foreach ( $Permissions as  $Permission)
          <div class="col-md-3">
            @if($Permission->id==13)
              <input checked class="minimal " value="{{$Permission->id}}" name="Role_Permissionsme[]"  type="checkbox"  > <label>{{$Permission->name}}</label>  <br>
            @else
              <input class="minimal " value="{{$Permission->id}}" name="Role_Permissionsme[]"  type="checkbox"  > <label>{{$Permission->name}}</label>  <br>
            @endif
          </div>             
          @endforeach
          
        </div>
        

        <div class="box-footer">
          {{--  <button type="submit" class="btn btn-default">Cancel</button>  --}}
          <button type="submit" class="btn btn-info pull-right">حفظ</button>
        </div>
    
      </form>
    </div>
    <!-- /.box-body -->
    <div class="callout callout-warning text-center">
        <h4>لكي تسطيع الدخول للجزء الأدمن يرجى أختيار أذن  
          <br><b>سماح-الدخول-الأدمن</b>!</h4>

        
      </div>
  </div>
  <!-- /.box -->
  


{{--  table show Roles :) :)  --}}

  <div class="box tbshow">
    <div class="box-header">
      <h3 class="box-title">جدول عرض الصالحيات </h3>
      @permission('أنشاء-صالحية')
          <div class="text-right">

         
          <h3 class="box-title "> لأضافة صالحية جديدة 	<button type="button"  id='AddProduct' class='btn btn-link btn-sm '>
					                	<i id='' class=' fa fa-plus'></i>
          </button>
           </h3>
          </div>
          @endpermission
     
           </div>
    <!-- /.box-header -->
    <div style="overflow-x:auto">
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>التسلسل</th>
              <th>الأسم</th>
            
              <th>الوصف</th>
              <th></th>
              
        </tr>
        </thead>
        <tbody>
            @foreach ($Roles as $i=>$Role )
               <tr>

                  <td>{{$i+1}}</td>
                  <td>{{$Role->name}}</td>
                  
                  <td>{{$Role->description}}</td>
                  <td>
                    <div class="row">
                        @permission('تعديل-صالحية')
                      <div class="col-md-3">
                          <a href="{{route('Role.edit',$Role->id)}}" class='btn btn-info btn-sm'><i class='fa fa-edit'></i></a>  
                      </div>
                      @endpermission
                      @if($Role->id!=2 && $Role->id!=3 && $Role->id!=4)
                      
                        @permission('مسح-صالحية')
                          <div class="col-md-3">
                            <form action="{{route('Role.destroy',$Role->id)}}" method="post">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
        
                                <button type="submit" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                            </form>
                          
                          </div>
                          @endpermission
                      @endif
                     
                    </div>
                   
                   </td>


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