@extends('account.homepage')

@section('content')


<div class="row">
<!-- general form elements disabled -->
<div class="col-xs-12 col-md-12">
    <div class=" ">
        @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 @if(isset($category))

 <div class="box box-warning">
    <div class="box-header with-border">
    <a href="{{url('Admin/Categories')}}">  <h3 class="box-title">أضف تصنيف جديد  </h3></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form method="post" action="{{url('/Admin/UpdatCategorysubmit')}}" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$category->id}}">
        <!-- text input -->
        <div class="form-group">
          <label>عنوان التصنيف  </label>
        <input value="{{$category->categories_name}}" name="Category_Name"  type="text" class="form-control" placeholder="أدخل  ...">
        </div>
       
  
        <!-- textarea -->
        <div class="form-group">
          <label>وصف التصنيف  </label>
          <textarea value=""  name="Category_Descraption" class="form-control" rows="3" placeholder="أدخل ...">{{$category->categories_descraption}}</textarea>
        </div>
        {{-- image --}}
  
        <div class="form-group">
          <label>صورة التصنيف  </label>
          <img height="50px;" width="50px" src="{{asset('CatImage/'.$category->image.'')}}" alt="">
          <input   type="file" name="image" id="">
        </div>
  
  
        <div class="box-footer">
          {{--  <button type="submit" class="btn btn-default">Cancel</button>  --}}
          <button type="submit" class="btn btn-info pull-right">تعديل</button>
        </div>
    
      </form>
    </div>
    <!-- /.box-body -->
  </div>

 @else
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">أضف تصنيف جديد  </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form method="post" action="{{url('/Admin/CategoriesStore')}}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
      <!-- text input -->
      <div class="form-group">
        <label>عنوان التصنيف  </label>
        <input required name="Category_Name"  type="text" class="form-control" placeholder="أدخل  ...">
      </div>
     

      <!-- textarea -->
      <div class="form-group">
        <label>وصف التصنيف  </label>
        <textarea  name="Category_Descraption" class="form-control" rows="3" placeholder="أدخل ..."></textarea>
      </div>
      {{-- image --}}

      <div class="form-group">
        <label>صورة التصنيف  </label>
        <input required  type="file" name="image" id="">
      </div>


      <div class="box-footer">
        {{--  <button type="submit" class="btn btn-default">Cancel</button>  --}}
        <button type="submit" class="btn btn-info pull-right">حفظ</button>
      </div>
  
    </form>
  </div>
  <!-- /.box-body -->
</div>

@endif
</div>
<!-- /.box -->


{{--  show the category in DB  --}}


        <div  class="col-xs-12 col-md-12 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">كل التصنيفات  </h3>

              <div class="box-tools">
             
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>التسلسل</th>
                  <th>الصورة</th>
                  <th>الأسم</th> 
                  <th></th>
                
                </tr>
                </thead>
                @foreach ($categorys as $i=>$category )
                <tr>
                <td>{{$i+1}}</td>
                  <td><img height="50px;" width="50px" src="{{asset('CatImage/'.$category->image.'')}}" alt=""></td>
                  <td>{{$category->categories_name}}</td>
                  {{-- <td>{{$category->categories_descraption}}</td> --}}
                  <td>
                      {{-- @permission('user-edit') --}}
                      <a href='{{url('/Admin/UpdatCategory/'.$category->id.'')}}' class='btn btn-info btn-sm'>
                        <i class='fa fa-edit'></i>
                      </a>
                      {{-- @endpermission @permission('user-delete') --}}
                      <a href='{{url('/Admin/DeleteCategory/'.$category->id.'')}}' class='btn btn-danger btn-sm'>
                        <i class="fa fa-trash"></i>
                      </a>
                      {{-- @endpermission --}}
                  </td>
                  
                 
                </tr>
                @endforeach
              
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>

@stop