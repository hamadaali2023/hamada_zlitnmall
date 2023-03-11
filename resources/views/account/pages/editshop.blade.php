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
  <div  class="box box-warning add_product ">
    <div class="box-header with-border">
      <h3 class="box-title">  تعديل بيانات المحل   </h3>
      @permission('product-read')
      <div class="text-right">
        <h3 class="box-title "> عرض المحلات  
        <a href="{{url('/Admin/shops')}}" id='showProduct' class='btn btn-link btn-sm '>
            <i id='' class=' fa fa-plus'></i>
          </a>
        </h3>
      </div>
      @endpermission
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form method="post" action="{{url('/Admin/Shopupdate')}}" enctype="multipart/form-data" role="form">

        {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$shop->id}}">
      <input type="hidden" name="user_id" value="{{$shop->user_id}}">

        <!-- select input -->
        <div class="form-group">
          <label>اختيار التصنيف  </label>
          <select name="shop_catogary" class="form-control select2" data-placeholder="أختر التصنيف" style="width: 100%;">

            @foreach ($catogorys as $catogory)
             @if($shop->shop_category==$catogory->id)
             <option  selected value="{{$catogory->id}}"> {{$catogory->categories_name}}</option>
             @else
             <option value="{{$catogory->id}}"> {{$catogory->categories_name}}</option>
             @endif

            @endforeach
          </select>
        </div>


        <!-- select input -->
        <div class="">
          <label>Choise cites</label>
          <br>
          <select name="shop_city" class="form-control select2"  data-placeholder="أختر المدينة " style="width: 100%;">

              @foreach ($cites as $city)

              @if($shop->shop_city==$city->id)
              <option selected value="{{$city->id}}"> {{$city->City_name}}</option>


              @else
              <option value="{{$city->id}}"> {{$city->City_name}}</option>


              @endif
  
  
              @endforeach
            </select>
          <br> 
        </div>
        <br>
        <br>


        <!-- text input -->
        <div class="form-group">
          <label> أسم المحل </label>
        <input name="shop_name" type="text" class="form-control" value="{{$shop->shop_name}}">
        </div>


       

       

        {{-- address --}}
        <div class="form-group ">
          <label>عنوان المحل  </label>
          
            <input name="shop_address" type="text" class="form-control"  value="{{$shop->shop_address}}">
         
        </div>
       
        <br> {{-- image --}}

        <div class="form-group col-md-6">
          <label>اختيار صورة  </label>
          <div class="input-group">
             @if($shop->shop_photo!='')
              <img height="100px;" width="100px" class="img-responsive" src="{{asset('shopPhoto/'.$shop->shop_photo.'')}}" alt="">
             @else
              <label for="">There is no files</label>
             @endif

            <input name="shop_image" id="Product_url" type="file" class="form-control">
          </div>
        </div>

        <div class="form-group col-md-6">
            <label>السجل التجاري (أختياري)   </label>
            <div class="input-group">
                @if($shop->Business_Register!='')
                <a target="_blank" href="{{asset('shopfiles')}}/{{$shop->Business_Register}}">
                  <h5>أضغط هنا للتنزيل  
                      <i class="fa fa-download"></i>
                  </h5>
              </a>
               @else
                <label for="">There is no files</label>
               @endif
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














@stop