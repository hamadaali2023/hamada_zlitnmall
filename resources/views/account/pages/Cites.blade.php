@extends('account.homepage')

@section('content')


<!-- general form elements disabled -->
<div class="row">
  <div class="col-xs-12 col-md-6">
      @if ($errors->any())
      <div class="alert alert-warning">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<div class="box box-warning ">
  @if(isset($city))
  <div class="box-header with-border">
      <h3 class="box-title">تعديل معلومات المدينة الحالية  </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form method="post" action="{{url('/Admin/CitesStoreupdate')}}" role="form">
          {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$city->id}}">
        <!-- text input -->
        <div class="form-group">
          <label>أسم المدينة</label>
        <input value="{{$city->City_name}}" name="City_Name"  type="text" class="form-control" placeholder="أدخل ...">
        </div>
  
        <div class="form-group">
            <label>(إختياري) كود المدينة</label>
            <input value="{{$city->City_code}}" name="City_code"  type="text" class="form-control" placeholder="أدخل ...">
          </div>
        <div class="box-footer">
          {{--  <button type="submit" class="btn btn-default">Cancel</button>  --}}
          <button type="submit" class="btn btn-info pull-right">حفظ</button>
        </div>
    
      </form>
    </div>

  @else

  <div class="box-header with-border">
    <h3 class="box-title">إضافة مدينة جديدة </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form method="post" action="{{url('/Admin/CitesStore')}}" role="form">
        {{ csrf_field() }}
      <!-- text input -->
      <div class="form-group">
        <label>أسم المدينة</label>
        <input required name="City_Name"  type="text" class="form-control" placeholder="أدخل ...">
      </div>

      <div class="form-group">
          <label>(إختياري) كود المدينة</label>
          <input name="City_code"  type="text" class="form-control" placeholder="أدخل ...">
        </div>
      <div class="box-footer">
        {{--  <button type="submit" class="btn btn-default">Cancel</button>  --}}
        <button type="submit" class="btn btn-info pull-right">حفظ</button>
      </div>
  
    </form>
  </div>
  <!-- /.box-body -->
  @endif
</div>
</div>
<!-- /.box -->


{{--  show the category in DB  --}}


        <div class="col-xs-12 col-md-6">
          <div class="box-body">
            <div class="box-header">
              <h3 class="box-title">كل المدن </h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th>التسلسل</th>
                  <th>أسم المدينة</th>
                  <th>كود المدينة</th>
                  <th></th>
                
                </tr>
                  </thead>
                  @foreach ($citys as $i=>$city )
                <tr>
                  <td>{{$i+1}}</td>
                  <td>{{$city->City_name}}</td> 
                  <td>{{$city->City_code}}</td> 
                  <td>
                      {{-- @permission('user-edit') --}}
                      <a href='{{url('/Admin/UpdatCity/'.$city->id.'')}}' class='btn btn-info btn-sm'>
                        <i class='fa fa-edit'></i>
                      </a>
                      {{-- @endpermission @permission('user-delete') --}}
                      <a href='{{url('/Admin/DeleteCity/'.$city->id.'')}}' class='btn btn-danger btn-sm'>
                        <i class="fa fa-trash"></i>
                      </a>
                      {{-- @endpermission --}}
                  </td>
                </tr>
                @endforeach  
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      </div>


@stop