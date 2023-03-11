@extends('account.homepage') @section('content')

<style>
  .select2-container{
    text-align: right !important;
  }
</style>


<!-- general form elements disabled -->
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

@if (\Session::has('Fail'))
<div class="alert alert-warning text-center">
    <ul>
        <li>{!! \Session::get('Fail') !!}</li>
    </ul>
</div>
@endif
  <div style="display: none" class="box box-warning add_product ">
    <div class="box-header with-border">
      <h3 class="box-title">إضافة محل جديد  </h3>
      @permission('قراءة-المحلات')
      <div class="text-right">
        <h3 class="box-title "> عرض المحلات  
          <button type="button" id='showProduct' class='btn btn-link btn-sm '>
            <i id='' class=' fa fa-plus'></i>
          </button>
        </h3>
      </div>
      @endpermission
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form method="post" action="{{url('/Admin/ShopStore')}}" enctype="multipart/form-data" role="form">

        {{ csrf_field() }}
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
 
        <!-- select input -->
        <div class="form-group">
          <label>اختيار التصنيف  </label>
          <select name="shop_catogary" class="form-control select2" data-placeholder="أختر التصنيف" style="width: 100%;">

            @foreach ($catogorys as $catogory)

            <option value="{{$catogory->id}}"> {{$catogory->categories_name}}</option>

            @endforeach
          </select>
        </div>


        <!-- select input -->
        <div class="">
          <label>Choise cites</label>
          <br>
          <select name="shop_city" class="form-control select2"  data-placeholder="أختر المدينة " style="width: 100%;">

              @foreach ($cites as $city)
  
              <option value="{{$city->id}}"> {{$city->City_name}}</option>
  
              @endforeach
            </select>
          <br> 
        </div>
        <br>
        <br>


        <!-- text input -->
        <div class="form-group">
          <label> أسم المحل </label>
          <input name="shop_name" type="text" class="form-control" placeholder="أدخل ...">
        </div>


       

       

        {{-- address --}}
        <div class="form-group ">
          <label>عنوان المحل  </label>
          
            <input name="shop_address" type="text" class="form-control" placeholder="أدخل ...">
         
        </div>
       
        <br> {{-- image --}}

        <div class="form-group col-md-6">
          <label>اختيار صورة  </label>
          <div class="input-group">
            <input name="shop_image" id="Product_url" type="file" class="form-control">
          </div>
        </div>

        <div class="form-group col-md-6">
            <label>السجل التجاري (أختياري)   </label>
            <div class="input-group">
              <input name="shop_Bussnuss" id="Product_url" type="file" class="form-control">
            </div>
          </div>


        <div class="box-footer">
          {{--
          <button type="submit" class="btn btn-default">Cancel</button> --}}
          <button type="submit" class="btn btn-info pull-right">حفظ</button>
        </div>

      </form>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<!-- /.box -->


{{-- show the category in DB --}}





<!-- /.box -->

<div class="box tbshow">
  <div class="box-header">
    <h3 class="box-title"></h3>
    @permission('أنشاء-محل')
    <div class="text-right">


      <h3 class="box-title ">إضافة محل  جديد 
        <button type="button" id='AddProduct' class='btn btn-link btn-sm '>
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
          <th> صورة المحل </th>
          <th>أسم المحل </th>
          <th>عنوان المحل</th>
          <th>المدينة</th>
          <th>التصنيف</th>
          <th>صاحب المحل </th>
          <th></th>
          

        </tr>
      </thead>
      <tbody>
        @foreach ($shops as $i=>$shop )
        <tr>

          <td>{{$i+1}}</td>
          <td>
            <img height="50px;" width="50px" class="img-responsive" src="{{asset('shopPhoto/'.$shop->shop_photo.'')}}" alt="">
          </td>
          <td>{{$shop->shop_name}}</td>
          <td>{{$shop->shop_address}}</td>
          <td>{{$shop->City_name}}</td>
          <td>{{$shop->categories_name}}</td>
          <td>
            {{$shop->name}}
          </td>
          <td>
            @permission('تعديل-محل')
            <a href='{{url('/Admin/Updateshop/'.$shop->id.'')}}' class='btn btn-info btn-sm'>
              <i class='fa fa-edit'></i>
            </a>
            @endpermission @permission('حذف-محل')
          <a href="{{url('/Admin/Deleteshop/'.$shop->id.'')}}"  class='btn btn-danger btn-sm '>
              <i class="fa fa-trash"></i>
            </a>
            @endpermission
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